<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RegisterController;
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

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('/category', CategoryController::class)
        ->except(['view']);
});

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [AuthenticationController::class, 'login']);
