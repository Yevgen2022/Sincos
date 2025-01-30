<?php

namespace App\Http\Controllers\User;

use App\Models\User;

class AdminUserIndexController
{
    public function index()
    {
//        $users = User::all();
        $users = User::paginate(10);
        return view('User.index', compact('users'));
    }

}