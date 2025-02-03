<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    public function getUsersPaginateRepository($number){
        return User::paginate($number);
    }

}