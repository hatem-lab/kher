<?php

namespace App\Http\Controllers\Site;
use App\Http\IRepositories\ILoginRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    protected $loginRepository;
    public function __construct(ILoginRepository   $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function  getLogin()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {

        $student=Student::where('email',$request->email)->first();
        $user=User::where('email',$request->email)->first();
        if($user)
        {

                if (auth()->guard('user')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")]))
                {
                    if($user->status == 1)
                    {
                    return redirect()->route('site.home');
                    }
                    if($user->status == 2)
                    {
                        return redirect()->back()->with(['error' => Lang::get('auth.You Are Banned',[],Config::get('app.locale'))]);

                    }
                }
                else
                {
                    return redirect()->back()->with(['error' => Lang::get('auth.something wrong in data input',[],Config::get('app.locale'))]);

                }


        }



        if($student) {
            if ($student->status == 1) {
                if (auth()->guard('student')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {

                    $user = auth('student')->user();
                    $not_t = $request->input('not_t');

                    if (isset($not_t)) {
                        $fcm_token = $request->input('not_t');
                    } else {
                        $fcm_token = '0';
                    }
                    $user->fcm_token = $fcm_token;
                    $user->save();

                    return redirect()->route('site.home');
                }

            }


        elseif($student->status == 0)
        {
            return redirect()->back()->with(['error' => Lang::get('الحساب قيد المراجعة',[],Config::get('app.locale'))]);

        }
        else
        {
           return redirect()->back()->with(['error' => Lang::get('auth.You Are Banned',[],Config::get('app.locale'))]);

        }


        }
        else
        {
            return redirect()->back()->with(['error' => Lang::get('auth.something wrong in data input',[],Config::get('app.locale'))]);

        }




        if(!$student || !$user)
        {

            return redirect()->back()->with(['error' => Lang::get('auth.something wrong in data input',[],Config::get('app.locale'))]);
        }
    }

    public function logoutUser()
    {

        if(auth('user')->user())
        {
            //dd('user');
            $gaurd = auth('user');
            $gaurd->logout();

            return redirect()->route('user.loginUser');
        }
        elseif(auth('student')->user())
        {

            $gaurd = auth('student');

            // for notification
            $user = $gaurd->user();
            $user->fcm_token = '0';
            $user->save();
            //

            $gaurd->logout();
            return redirect()->route('user.loginUser');
        }else
        {

            return redirect()->route('site.home');
        }


    }



}
