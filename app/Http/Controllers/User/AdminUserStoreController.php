<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminUserStoreController
{


    private UserService $userService;
    private UserRepository $userRepository;

    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }
    public function showCreateForm()
    {
        $roles = $this->userService->getRolesUserService();
        return view('User.showCreateForm', compact('roles'));
    }


    public function store(UserStoreRequest $request)
    {

        $this->userService->storeUserService($request->validated());
        return redirect()->route('admin.user')->with('success', 'Користувача успішно додано');
    }


}


