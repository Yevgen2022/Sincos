<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/homeUserPage', [App\Http\Controllers\HomeController::class, 'homeUserPage'])->name('homeUserPage');

//Route::get('/category/create', [App\Http\Controllers\Category\CategoryCreateController::class, 'showForm'])->name('categories.showForm');
//Route::get('/category/{id}', [App\Http\Controllers\Category\CategoryEditController::class, 'edit'])->name('categories.edit');
//Route::put('/category/{id}', [App\Http\Controllers\Category\CategoryUpdateController::class, 'update'])->name('categories.update');
//Route::delete('/category/{id}', [App\Http\Controllers\Category\CategoryDeleteController::class, 'delete'])->name('categories.delete');
//Route::post('/category/create', [App\Http\Controllers\Category\CategoryCreateController::class, 'store'])->name('categories.create');
//Route::get('/category', App\Http\Controllers\Category\CategoryIndexController::class)->name('category');



Route::resource('products', \App\Http\Controllers\Product\ProductController::class);
Route::resource('categories', \App\Http\Controllers\Category\CategoryController::class);



//Route::middleware(['auth', 'admin'])->group(function () {
Route::put('/admin/update/{id}', [App\Http\Controllers\User\AdminUserUpdateController::class, 'update'])->name('user.update');
Route::get('/admin/update/{id}', [App\Http\Controllers\User\AdminUserUpdateController::class, 'showEditForm'])->name('user.showEditForm');
Route::get('/admin/user', [App\Http\Controllers\User\AdminUserIndexController::class, 'index'])->name('admin.user');
Route::delete('/admin/{id}', [App\Http\Controllers\User\AdminUserDeleteController::class, 'destroy'])->name('user.destroy');
Route::get('/admin/store', [App\Http\Controllers\User\AdminUserStoreController::class, 'showCreateForm'])->name('user.showCreateForm');
Route::post('/admin/store', [App\Http\Controllers\User\AdminUserStoreController::class, 'store'])->name('user.store');
Route::get('/admin', [App\Http\Controllers\Admin\AdminIndexController::class, 'index'])->name('admin.dashboard');
//});

Route::get('/productUser', [App\Http\Controllers\ProductsForUser\ProductsUserIndexController::class, 'index'])->name('productUser.index');
Route::get('/categoryUser', [App\Http\Controllers\CategoryForUser\CategoryUsersIndexController::class, 'index'])->name('categoryforusers.index');
Route::get('/categoryUser/filter', [App\Http\Controllers\CategoryForUser\CategoryUsersIndexController::class, 'filter'])->name('categoryforusers.filter');

Route::get('/carddetail/{id}', [App\Http\Controllers\CardDetail\CardDetailIndexController::class, '__invoke'])->name('carddetail');
Route::get('/product/{id}/reviews', [App\Http\Controllers\Review\ReviewController::class, 'getReviews'])->name('product.reviews');

