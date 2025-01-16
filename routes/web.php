<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
