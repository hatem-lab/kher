<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ILoginRepository;
use App\Http\IRepositories\IProfileRepository;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;


class LoginRepository extends BaseRepository implements ILoginRepository
{

    public function model()
    {
        return User::class;
    }

    public function getLogin()
    {
        return view('auth.login');
    }
    public function Login($request)
    {
        if($user=User::where('email',$request->email)->first())
        {
            if($user->status == 2)
            {
                return redirect()->back()->with(['error' => Lang::get('auth.You Are Banned',[],Config::get('app.locale'))]);

            }


            if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            // for notification
            $user = auth('admin')->user();
            $not_t = $request->input('not_t');
            if (isset($not_t)) {
                $fcm_token = $request->input('not_t');
            } else {
                $fcm_token = '0';
            }
            $user->fcm_token = $fcm_token;
            $user->save();
            return redirect()->route('home');
          }
        }
        return redirect()->back()->with(['error' => Lang::get('auth.something wrong in data input',[],Config::get('app.locale'))]);
    }
    public function Logout()
    {
        $gaurd = $this->getGaurd();

        // for notification
        $user = $gaurd->user();
        $user->fcm_token = '0';
        $user->save();
        //

        $gaurd->logout();
        return redirect()->route('admin.login');
    }
    private function getGaurd()
    {
        return auth('admin');
    }

}
