<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{

    private $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function getUsersPaginateService($number){
        return $this->userRepository->getUsersPaginateRepository($number);
    }

}