<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{


    private UserService $userService;
    private UserRepository $userRepository;

    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $number = 5;
        $users = $this->userService->getUsersPaginateService($number);

        return view('User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->userService->getRolesUserService();
        return view('User.showCreateForm', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $this->userService->storeUserService($request->validated());
        return redirect()->route('users.index')->with('success', 'User was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userService->getUserByIdService($id);
        $roles = $this->userService->getRolesUserService();
        return view('User.showEditForm', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = $this->userService->getUserByIdService($id);
        $validatedData = $request->validated();
        $this->userService->updateUserService($user, $validatedData);

        return redirect()->route('users.index')->with('success', 'User successfully added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->userService->getUserByIdService($id);

        if ($this->userService->checkIfAdminService($user)) {
            return redirect()->route('users.index')->with('error', 'You cannot delete an admin user.');
        }

        $this->userService->deleteUserService($user);
        return redirect()->route('users.index')->with('success', "User {$user->name} ({$user->email}) deleted successfully.");
    }

}
