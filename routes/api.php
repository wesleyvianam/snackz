<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Team\TeamController;
use Illuminate\Http\Request;
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

Route::put('profile', [ProfileController::class, 'update'])->middleware('auth:sanctum');
Route::get('team', [TeamController::class, 'index'])->middleware('auth:sanctum');

Route::post('register', [RegisterController::class, 'register']);

Route::post('employee', [RegisterController::class, 'register']);

Route::post('login', [AuthenticationController::class, 'login']);
