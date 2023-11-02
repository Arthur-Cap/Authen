<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Home extends Controller
{
    public function index()
    {
        $user = Auth::user()->username;
        if(Auth::user()->email_verified_at ===null){
        return view('verifyEmail');

        }
        return view('home', ['user' => $user]);
    }
}

