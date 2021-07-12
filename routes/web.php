<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function(){ return view('dashboard'); })->name('dashboard');
    Route::prefix('/users-management')->group(function(){
        Route::get('users', [App\Http\Controllers\Admin\UserManagerController::class, 'users'])->name('users-management.users');
        Route::resource('roles', App\Http\Controllers\Admin\RolesController::class);
        Route::get('permissions', [App\Http\Controllers\Admin\UserManagerController::class, 'permissions'])->name('users-management.permissions');

    });
    Route::prefix('/products')->name('products.')->group(function () {
        Route::resource('list', App\Http\Controllers\Admin\ProductsController::class);
        Route::get('categories', [App\Http\Controllers\Admin\ProductsController::class, 'categories'])->name('categories');
        Route::get('units', [App\Http\Controllers\Admin\ProductsController::class, 'units'])->name('units');
    });
});

