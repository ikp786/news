<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'loginView')->name('login');
    Route::post('loginPost', 'login')->name('login.post');
});

Route::middleware(['admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('/', 'index');
    });

    Route::resource('categories', CategoryController::class);
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories/status/{id}', 'status')->name('category.status');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });

});
