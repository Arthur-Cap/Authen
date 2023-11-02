<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailVerify;
use App\Models\User;


class ChangeEmail extends Controller
{
    public function create()
    {
        return view('changeEmail');
    }

    public function store(Request $request)
    {
        $message="";
        $user = User::where('username', Auth::user()->username)->first();
        $emailVerify = EmailVerify::where('userId', Auth::user()->id)->first();

        if($emailVerify===null || $emailVerify->change_email_token !== $request->input("otpInput")){
            $message = 'OTP không hợp lệ';
        } else{
            $user->email = $emailVerify->email;
            $user->save();
            $message = 'Đổi thành công';

        }

        return view('changeEmail')->with('message', $message);
    }
    public function genOTP(Request $request)
    {
        $emailVerify = EmailVerify::where( 'userId', Auth::user()->id)->first();

        if ($emailVerify === null) {
            $emailVerify = new EmailVerify();
            $emailVerify->userId = Auth::user()->id;
            $emailVerify->email = Auth::user()->email;
        }

            
            $emailVerify->email =   $request->input("newEmail");
            $otp = random_int(100000, 999999);
            $emailVerify->change_email_token = $otp;
            $emailVerify->save();

            return view('confirmOTP')->with('message', "Đã gửi OTP");

    }


}
