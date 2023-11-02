<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class EmailVerify extends Controller
{
    public function create()
    {
        return view('verifyEmail');
    }
    public function store(FormRequest $request)
    {
        if (Auth::check()) {
            $user = User::where('username', Auth::user()->username)->first();
            if ($user) {
                if ($request->input('otp') === $user->verify_email_token) {
                    $user->email_verified_at = Carbon::now();
                    $user->save();
                    return redirect('/');
                } else {
                    $try = $user->token_try;

                    if (($try+1) >= 3) {
                        $otp = random_int(100000, 999999);
                        $user->verify_email_token = $otp;
                        $try = 0;
                    } else {
                        $try++;
                    }
                    $user->token_try = $try;
                    $user->save();

                    $errors = ['email-verify' => "Sai mã OTP" . ($try === 0 ? " mã OTP đã được gửi lại" : " bạn đã thử " . ( $try) . "/3 lần")];

                    return redirect('/email-verify')
                        ->withErrors($errors)
                        ->withInput();
                }
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
}
