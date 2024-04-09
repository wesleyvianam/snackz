<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Recurrent\RecurrentController;
use App\Http\Controllers\setting\CompanyController;
use App\Http\Controllers\setting\SettingsController;
use App\Http\Controllers\Snack\SnackController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::post('/members', [MemberController::class, 'store'])->name('members.store');
    Route::delete('/members/{user}', [MemberController::class, 'destroy'])->name('members.destroy');

    Route::resource('/categories', CategoryController::class)
        ->except(['create','edit','show','update']);

    Route::resource('/snacks', SnackController::class)
        ->except(['create','edit','show','update']);

    Route::resource('/home', OrderController::class)
        ->except(['create','edit','show','update']);

    Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::resource('/recurrent', RecurrentController::class)
        ->except(['create','edit','show','update']);

    Route::put('/recurrent/{order}', [RecurrentController::class, 'update'])
        ->name('recurrent.update');

    Route::get('/premium', function () {
        return view('layouts.premium');
    })->name('layouts.premium');
});

require __DIR__.'/auth.php';
