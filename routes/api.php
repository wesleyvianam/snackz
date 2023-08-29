<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Snack\SnackController;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Workspace\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('/categories', CategoryController::class)
        ->except(['view']);

    Route::apiResource('/{category}/snacks', SnackController::class)
        ->except(['view']);

    Route::apiResource('/workspace', WorkspaceController::class)
        ->except(['view', 'store', 'destroy']);
});

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [AuthenticationController::class, 'login']);
