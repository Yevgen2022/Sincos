<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/homeUserPage', [App\Http\Controllers\HomeController::class, 'homeUserPage'])->name('homeUserPage');

Route::get('/category/create', [App\Http\Controllers\Category\CategoryCreateController::class, 'showForm'])->name('categories.showForm');
Route::get('/category/{id}', [App\Http\Controllers\Category\CategoryEditController::class, 'edit'])->name('categories.edit');
Route::put('/category/{id}', [App\Http\Controllers\Category\CategoryUpdateController::class, 'update'])->name('categories.update');
Route::delete('/category/{id}', [App\Http\Controllers\Category\CategoryDeleteController::class, 'delete'])->name('categories.delete');
Route::post('/category/create', [App\Http\Controllers\Category\CategoryCreateController::class, 'store'])->name('categories.create');
Route::get('/category', App\Http\Controllers\Category\CategoryIndexController::class)->name('category');


Route::put('/products/store', [App\Http\Controllers\Products\ProductsStoreController::class, 'store'])->name('product.store');
Route::put('/products/{id}', [App\Http\Controllers\Products\ProductsUpdateController::class, 'update'])->name('product.update');
Route::get('/products/create', [App\Http\Controllers\Products\ProductsStoreController::class, 'showCreateForm'])->name('product.showCreateForm');
Route::get('/products/{id}', [App\Http\Controllers\Products\ProductsUpdateController::class, 'showEditForm'])->name('product.showEditForm');
Route::delete('/products/{id}', [App\Http\Controllers\Products\ProductsDeleteController::class, 'delete'])->name('product.delete');
Route::get('/products', App\Http\Controllers\Products\ProductsIndexController::class)->name('products');




//use App\Http\Controllers\ProductController;
//
//Route::prefix('products')->group(function () {
//    Route::get('/', [ProductController::class, 'index']);
//    Route::post('/', [ProductController::class, 'store']);
//    Route::get('/{id}', [ProductController::class, 'show']);
//    Route::put('/{id}', [ProductController::class, 'update']);
//    Route::delete('/{id}', [ProductController::class, 'destroy']);
//});




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

