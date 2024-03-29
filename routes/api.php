<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\ReportsController;
use App\Http\Controllers\Snack\SnackController;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\RecoverController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Workspace\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/categories', CategoryController::class)
        ->except(['view']);

    Route::apiResource('/{category}/snacks', SnackController::class)
        ->except(['view']);

    Route::apiResource('/workspace', WorkspaceController::class)
        ->except(['view', 'store', 'destroy']);

    Route::apiResource('/members', MemberController::class);

    Route::apiResource('/orders', OrderController::class);

    Route::get('options', [CategoryController::class, 'options']);

    Route::post('logout', [LogoutController::class, 'logout']);
});

Route::group([], function () {
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('login', [AuthenticationController::class, 'login']);

    Route::post('forgot', [RecoverController::class, 'store']);

    Route::post('recover', [RecoverController::class, 'update']);
});
