<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailVerify;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class ForgotPassword extends Controller
{
    public function create()
    {
        return view('ForgotPassword');
    }
    public function store(Request $request)
    {
        $email = session('emailForReset');
        $user = User::where('email', $email)->first();
        $OTPVerify = EmailVerify::where('userId',  $user->id)->first();
        if ($OTPVerify->forgot_password_token === $request->input("otpInput")) {
            $user->password = $OTPVerify->temp_password;
            $user->save();
            return view('ForgotPassOTP')->with('message', "Đổi mật khẩu thành công, bạn có thể login bằng mật khẩu mới");
        } else return view('ForgotPassOTP')->with('message', "OTP sai");
    }
    public function enterPass(Request $request)
    {
        session()->put('emailForReset', $request->input('email'));


        $user = User::where('email', $request->input('email'))->first();

        if ($user === null) {
            return view('ForgotPassword')->with('message', "Email không tồn tại");
        }
        return view('NewPassword');
    }
    public function genOTP(Request $request)
    {

        $email = session('emailForReset');
        $pass = $request->input('pass');


        $user = User::where('email', $email)->first();

        if ($user === null) {
            return view('ForgotPassword')->with('message', "Email không tồn tại");
        }


        $OTPVerify = EmailVerify::where('userId',  $user->id)->first();

        if ($OTPVerify === null) {
            $OTPVerify = new EmailVerify();
            $OTPVerify->userId = $user->id;
        }
        $otp = random_int(100000, 999999);
        $OTPVerify->forgot_password_token = $otp;
        $OTPVerify->temp_password = Hash::make($pass);

        $OTPVerify->save();

        return view('ForgotPassOTP')->with('message', "Đã gửi OTP");
    }
}
