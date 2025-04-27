<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminIndexController extends Controller
{


    public function index(){
//        dd(Auth()->user());
        return view('admin.index');
    }
}
