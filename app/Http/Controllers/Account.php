<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Repositories\AccountRepository\AccountRepository;
use Illuminate\Support\Facades\Auth;



class Account extends Controller
{
    protected $accountRepository;
    
    function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function create () : View{
        return view('login');
    }
    public function store (Request $request) : RedirectResponse {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required'],
        ]);

        //$result = $this->accountRepository->checkAccount($request->input('username'), $request->input('password'));
        $result = Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')]);
        
        if($result === false) {
        return redirect('/register');
        }
        
        if(Auth::user()->email_verified_at === null) {
            return redirect('/email-verify');
        } ;
        return redirect('/');
    }
}
