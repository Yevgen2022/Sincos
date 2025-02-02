<?php

namespace App\Http\Controllers\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminUserStoreController
{
    public function showCreateForm()
    {
        $roles = Role::all();
        return view('User.showCreateForm', compact('roles'));
    }


    public function store(Request $request)
    {
        // Data validation from the request
        $validatedData = $request->validate([
            'name' => 'required|max:255',  // Increased maximum size to 255
            'email' => 'required|email|unique:users,email',  // Validation for a unique email
            'job' => 'required|max:255',   // Increased maximum size to 255
            'role_id' => 'required|exists:roles,id',  // Checking if a role exists in the roles table
        ], [
            'name.required' => 'Name is a required field.',
            'name.max' => 'Name cannot exceed 255 characters.',
            'email.required' => 'Email is a required field.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'job.required' => "The field of profession is mandatory.",
            'job.max' => 'Profession cannot exceed 255 characters.',
            'role.required' => 'Role is a required field.',
            'role.in' => 'Role must be either "user" or "admin".',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->job = $validatedData['job'];
        $user->role_id = $validatedData['role_id'];
        $user->password = bcrypt('password'); // We set the default password Hashing the password before saving
        $user->remember_token = Str::random(60);
        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('admin.user')->with('success', 'Користувача успішно додано');
    }


}


