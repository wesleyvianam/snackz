<?php

use App\Http\Controllers\Category\TeamController;
use App\Http\Controllers\Snack\SnackItemsController;
use App\Http\Controllers\Snack\SnackListController;
use App\Http\Controllers\Snack\SnackOptionsController;
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
    Route::put('profile', [ProfileController::class, 'update']);

    Route::get('team', [TeamController::class, 'index']);

    Route::post('team', [RegisterController::class, 'register']);

    Route::apiResource('/snack', SnackItemsController::class)
        ->except(['index', 'show', 'create', 'edit']);

    Route::apiResource('/snack/{snack}/option', SnackOptionsController::class)
        ->except(['index', 'show', 'create', 'edit']);

    Route::get('snack', [SnackListController::class, 'index']);
});

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [AuthenticationController::class, 'login']);
