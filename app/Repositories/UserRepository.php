<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;

class UserRepository
{

    public function getUsersPaginateRepository($number)
    {
        return User::paginate($number);
    }

    public function getRolesUserRepository()
    {
        return Role::all();
    }

    public function storeUserRepository($data)
    {
        return User::create($data);
    }

    public function getUserByIdRepository($id){
        return User::findOrFail($id);
    }


    public function updateUserRepository($user, $data){
        return $user->update($data);
    }
}