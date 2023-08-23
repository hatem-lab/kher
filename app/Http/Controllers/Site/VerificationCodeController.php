<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Http\Services\VerificationServices;
use App\Models\Student;
use Illuminate\Http\Request;

class VerificationCodeController extends Controller
{

    public $verificationService;
     public function __construct(VerificationServices $verificationService)
     {
         $this  -> verificationService = $verificationService;
     }

    public function verify(VerificationRequest $request)
    {

        $check = $this ->  verificationService -> checkOTPCode($request);
        if(!$check){  // code not correct
          //  return 'you enter wrong code ';
            return redirect() -> route('get.verification.form')-> withErrors(['code' => 'الكود الذي ادخلته غير صحيح ']);
        }else {  // verifiction code correct
            $this ->  verificationService -> removeOTPCode($request -> code);
            if(auth('student')->user())
            {
                $id=auth('student')->user()->id;
            }else
            {
                $id=$request->id;

            }
            $user=Student::where('id',$id)->first();
            if($user->status == 0)
            {
                return redirect()->route('site.home.inreview');
            }elseif($user->status == 1)
            {
                return redirect()->route('site.home');
            }else
            {
                $gaurd = auth('student');

                // for notification
                $user = $gaurd->user();
                $user->fcm_token = '0';
                $user->save();
                //

                $gaurd->logout();
                return redirect()->route('user.loginUser');

            }


           // return redirect()->route('site.home');
        }
    }

    public function getVerifyPage()
    {
        return view('auth.verification') ;
    }
    public function inreview()
    {
        return view('user.inreview_page');
    }

}
