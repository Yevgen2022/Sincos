<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',  // Increased maximum size to 255
            'email' => 'required|email|unique:users,email,' . $this->route('id'),
            'job' => 'required|max:255',   // Increased maximum size to 255
            'role_id' => 'required|exists:roles,id',  // Checking if a role exists in the roles table
            'password' => 'nullable|min:8|confirmed', //  field `password` does not necessary
        ];
    }


    public function messages(): array
    {
        return [
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

        ];
    }


}