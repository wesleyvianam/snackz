<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Snack\SnackController;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('/categories', CategoryController::class)
        ->except(['view']);

    Route::apiResource('/{category}/snacks', SnackController::class)
        ->except(['view']);
});

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [AuthenticationController::class, 'login']);
