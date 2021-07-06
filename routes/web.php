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
    Route::prefix('/user-manager')->group(function(){
        Route::get('users', [App\Http\Controllers\Admin\UserManagerController::class, 'users'])->name('user-manager.users');
        Route::get('roles', [App\Http\Controllers\Admin\UserManagerController::class, 'roles'])->name('user-manager.roles');
        Route::get('permissions', [App\Http\Controllers\Admin\UserManagerController::class, 'permissions'])->name('user-manager.permissions');

    });
});

