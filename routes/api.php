<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function () {
  Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
  Route::get('product', [App\Http\Controllers\Api\ProductController::class, 'getProduct']);
});

// endpint - fungsi di controller
Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
