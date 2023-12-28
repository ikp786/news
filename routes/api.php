<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::fallback(function () {
    return response()->json([
        'ResponseCode'  => 404,
        'status'        => False,
        'message'       => 'URL not found as you looking'
    ]);
});

Route::get('unauthorized', function () {
    return response()->json(['statusCode' => 400, 'status' => 'unauthorized', 'message' => 'Unauthorized user.']);
})->name('api.unauthorized');
