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
        // Валідація даних з запиту
        $validatedData = $request->validate([
            'name' => 'required|max:255',  // Збільшено максимальний розмір до 255
            'email' => 'required|email|unique:users,email',  // Валідація для унікального email
            'job' => 'required|max:255',   // Збільшено максимальний розмір до 255
            'role' => 'required|in:user,admin',  // Перевірка на допустимі ролі
//            'password' => 'required|min:8', // Додав валідацію для пароля
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

        // Створення нового користувача
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->job = $validatedData['job'];
        $user->role = $validatedData['role'];
        $user->password = bcrypt('password'); // Встановлюємо пароль за замовчуванням // Хешування пароля перед збереженням
        $user->remember_token = Str::random(60);
        $user->email_verified_at = now();
        $user->save();

        // Повернення відповіді (наприклад, переадресація чи повідомлення)
        return redirect()->route('admin.user')->with('success', 'Користувача успішно додано');
    }


}


