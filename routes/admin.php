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

    // CATEGORY
    Route::resource('categories', CategoryController::class);
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories/status/{id}', 'status')->name('category.status');
    });

    // NEWS
    Route::resource('news', NewsController::class);
    Route::controller(NewsController::class)->group(function () {
        Route::get('news/status/{id}', 'status')->name('news.status');
        Route::post('news/layout', 'getLayout')->name('news.layout');
    });

    // WEBSTORIES
    Route::resource('web_stories', WebStoryController::class);
    Route::controller(WebStoryController::class)->group(function () {
        Route::get('web_stories/status/{id}', 'status')->name('web_stories.status');
        Route::post('web_stories/layout', 'getLayout')->name('web_stories.layout');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });

});
