<?php

use App\Http\Controllers\CategoryIndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/homeUserPage', [App\Http\Controllers\HomeController::class, 'homeUserPage'])->name('homeUserPage');


Route::get('/category', App\Http\Controllers\Category\CategoryIndexController::class)->name('category');







//Route::prefix('categories')->group(function () {
//    Route::get('/', CategoryIndexController::class)->name('categories.index');
//    Route::get('/create', CategoryCreateController::class)->name('categories.create');
//    Route::post('/', CategoryStoreController::class)->name('categories.store');
//    Route::get('/{category}/edit', CategoryEditController::class)->name('categories.edit');
//    Route::put('/{category}', CategoryUpdateController::class)->name('categories.update');
//    Route::delete('/{category}', CategoryDestroyController::class)->name('categories.destroy');
//});
