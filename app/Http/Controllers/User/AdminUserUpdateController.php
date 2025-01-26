<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserUpdateController
{
    public function showEditForm($id)
    {
        $user = User::findOrFail($id);

        return view('User.showEditForm', compact('user'));
    }


    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id); // Знаходимо користувача за ID

        // Валідація даних з запиту
        $validatedData = $request->validate([

            'name' => 'required|max:255',  // Збільшено максимальний розмір до 255
            'email' => 'required|email|unique:users,email,' . $user->id,  // Валідація для унікального email $user->id-виключається з перевірки
            'job' => 'required|max:255',   // Збільшено максимальний розмір до 255
            'role' => 'required|in:user,admin',  // Перевірка на допустимі ролі
            'password' => 'nullable|min:8|confirmed', //  Поле `password` необов'язкове

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


        // Створення нового користувача
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->job = $validatedData['job'];
        $user->role = $validatedData['role'];

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']); // Не змінюємо пароль
        }

        $user->update($validatedData);


        // Повернення відповіді (наприклад, переадресація чи повідомлення)
        return redirect()->route('admin.user')->with('success', 'User successfully added');
    }


}


