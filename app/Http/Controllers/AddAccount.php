<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Repositories\AccountRepository\AccountRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AddAccount extends Controller
{
    protected $accountRepository;

    function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function create(): View
    {

        return view('register');
    }

    public function store(FormRequest $request): RedirectResponse
    {

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required'],
            'email' => ['required', 'string', 'max:255']
        ]);

        $errors = [];

        if ($this->accountRepository->checkEmail($request->input('email'))) {
            $errors['email'] = 'Email đã tồn tại.';
        }

        if ($this->accountRepository->checkUserName($request->input('username'))) {
            $errors['username'] = 'User Name đã tồn tại.';
        }

        if (!empty($errors)) {
            return redirect()->route('register')->withErrors($errors);
        }


        $account = new User();
        $account->userName = $request->input('username');
        $account->email = $request->input('email');
        $account->password = Hash::make($request->input('password'));

        $otp = random_int(100000, 999999);
        $account->verify_email_token = $otp;
        $result = $account->save();
        dd($result);
        return redirect('/');
    }
}
