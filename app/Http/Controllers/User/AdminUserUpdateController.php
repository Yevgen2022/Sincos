<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserUpdateController
{


    private UserService $userService;
    private UserRepository $userRepository;

    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function showEditForm($id)
    {
        $user = $this->userService->getUserByIdService($id);
        $roles = $this->userService->getRolesUserService();
        return view('User.showEditForm', compact('user', 'roles'));
    }


    public function update(UserUpdateRequest $request, $id)
    {

        $user = $this->userService->getUserByIdService($id);
        $validatedData = $request->validated();
        $this->userService->updateUserService($user, $validatedData);

        return redirect()->route('admin.user')->with('success', 'User successfully added');
    }


}


