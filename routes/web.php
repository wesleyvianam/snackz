<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Snack\SnackController;
use App\Http\Controllers\User\settingsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {    return view('home');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/setting', [settingsController::class, 'index'])->name('setting.index');

    Route::resource('/members', MemberController::class)
        ->except(['create','edit','show','update']);

    Route::resource('/categories', CategoryController::class)
        ->except(['create','edit','show','update']);

    Route::resource('/snacks', SnackController::class)
        ->except(['create','edit','show','update']);
});

require __DIR__.'/auth.php';
