<?php

namespace App\Http\Services;

use App\Models\Student;
use App\Models\User;
use App\Models\User_verfication;
use Illuminate\Support\Facades\Auth;


class VerificationServices
{
    /** set OTP code for mobile
     * @param $data
     *
     * @return User_verfication
     */
    public function setVerificationCode($data)
    {
        $code = mt_rand(100000, 999999);

        $data['code'] = $code;
        User_verfication::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
        return User_verfication::create($data);
    }

    public function getSMSVerifyMessageByAppName( $code)
    {
            $message = " is your verification code for your account";
             return $code.$message;
    }


    public function checkOTPCode ($request){

        if(auth('student')->user())
        {
            $id=auth('student')->user()->id;
        }else
        {
            $id=$request->id;

        }
        $verificationData = User_verfication::where('user_id',$id) -> first();
        if($verificationData -> code == $request->code){
            Student::whereId($id) -> update(['email_verified_at' => now()]);
            return true;
        }
        else{
            return false;
        }


//        if(Auth::guard('student')->check())
//        {
//
//
//        }

        //return false ;
    }

    public function removeOTPCode($code)
    {
        User_verfication::where('code',$code) -> delete();
    }

}
