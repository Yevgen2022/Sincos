<?php

namespace App\Http\Controllers\User;

use App\Models\User;

class AdminUserIndexController
{
    public function index()
    {
        $users = User::all();
        return view('User.index', compact('users'));
    }

}