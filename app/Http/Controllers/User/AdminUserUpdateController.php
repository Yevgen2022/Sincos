<?php

namespace App\Http\Controllers\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserUpdateController
{
    public function showEditForm($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('User.showEditForm', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        // Data validation from the request
        $validatedData = $request->validate([

            'name' => 'required|max:255',  // Increased maximum size to 255
            'email' => 'required|email|unique:users,email,' . $user->id,  // Validation for a unique email
            'job' => 'required|max:255',   // Increased maximum size to 255
            'role_id' => 'required|exists:roles,id',  // Checking if a role exists in the roles table
            'password' => 'nullable|min:8|confirmed', //  field `password` does not necessary

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
            'password.min' => "Password cannot exceed minimum then 8 characters ",
            'password.confirmed' => "Password confirmation does not match.",

        ]);


        // Create a new user
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->job = $validatedData['job'];
        $user->role_id = $validatedData['role_id'];

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']); // Do not change password
        }

        $user->update($validatedData);

        return redirect()->route('admin.user')->with('success', 'User successfully added');
    }


}


