<?php

namespace App\Repositories\AccountRepository;

use App\Repositories\BaseRepositoryInterface;

interface AccountRepositoryInterface extends BaseRepositoryInterface
{
    function checkAccount($account, $password) ;

}
