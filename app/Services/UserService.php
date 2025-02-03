<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsersPaginateService($number)
    {
        return $this->userRepository->getUsersPaginateRepository($number);
    }

    public function getRolesUserService()
    {
        return $this->userRepository->getRolesUserRepository();
    }

    public function storeUserService(array $data)
    {
        $data['password'] = bcrypt('password'); // We set the default password Hashing the password before saving
        $data['remember_token'] = Str::random(60);
        $data['email_verified_at'] = now();

        return $this->userRepository->storeUserRepository($data);

    }


}