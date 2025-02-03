<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;

class AdminUserIndexController extends Controller
{

    private UserService $userService;
    private UserRepository $userRepository;

    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        $number = 5;
        $users = $this->userService->getUsersPaginateService($number);

        return view('User.index', compact('users'));

    }

}