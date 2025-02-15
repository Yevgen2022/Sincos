<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('home');
//});


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//    Route::prefix('admin')->group(function () {
    Route::resource('admin/products', \App\Http\Controllers\Product\ProductController::class);
    Route::resource('admin/categories', \App\Http\Controllers\Category\CategoryController::class);
    Route::resource('admin/users', \App\Http\Controllers\User\UserController::class);
    Route::get('admin', [App\Http\Controllers\Admin\AdminIndexController::class, 'index'])->name('admin.dashboard');
//    });
//});


Route::middleware(['auth'])->group(function () {
    Route::get('/homeUserPage', [App\Http\Controllers\HomeController::class, 'homeUserPage'])->name('homeUserPage');

    Route::get('/productUser', [App\Http\Controllers\ProductsForUser\ProductsUserIndexController::class, 'index'])->name('productUser.index');
    Route::get('/categoryUser', [App\Http\Controllers\CategoryForUser\CategoryUsersIndexController::class, 'index'])->name('categoryforusers.index');
    Route::get('/categoryUser/filter', [App\Http\Controllers\CategoryForUser\CategoryUsersIndexController::class, 'filter'])->name('categoryforusers.filter');

    Route::get('/carddetail/{id}', [App\Http\Controllers\CardDetail\CardDetailIndexController::class, '__invoke'])->name('carddetail');
    Route::get('/product/{id}/reviews', [App\Http\Controllers\Review\ReviewController::class, 'getReviews'])->name('product.reviews');

});