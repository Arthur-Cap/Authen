<?php

namespace App\Repositories\AccountRepository;

use App\Repositories\AccountRepository\AccountRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AccountRepository extends BaseRepository implements AccountRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    function checkAccount($account, $password) {

        $user = User::where('username', $account)->first();
    
        if ($user && Hash::check($password, $user->password)) {
            return true;
        }
        return false;
    }
    function checkEmail($email) {

        $user = User::where('email', $email)->first();
    
        if ($user ) {
            return true;
        }

        return false;
    }

    function checkUserName($userName) {
        $user = User::where('userName', $userName)->first();
        if ($user ) {
            return true;
        }     
        return false;
    }
    
    // function checkRole($account) {
    //     $user = User::where('userName', $account)->first();
    
    //     if ($user && "admin"===$user->role) {
    //         return true;
    //     }
    //     return false;
    // }
}
