<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Services\UserService;

class AdminUserDeleteController
{


    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function destroy($id)
    {

        $user = $this->userService->getUserByIdService($id);

        if ($this->userService->checkIfAdminService($user)) {
            return redirect()->route('admin.user')->with('error', 'You cannot delete an admin user.');
        }

        $this->userService->deleteUserService($user);
        return redirect()->route('admin.user')->with('success', "User {$user->name} ({$user->email}) deleted successfully.");
    }

}