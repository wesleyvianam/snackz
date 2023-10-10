<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home', function () {    return view('home');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Config Workspace
    Route::get('/setting', [SettingsController::class, 'index'])->name('setting.index');
    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');

    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::post('/members', [MemberController::class, 'store'])->name('members.store');
    Route::delete('/members/{user}', [MemberController::class, 'destroy'])->name('members.destroy');

    Route::resource('/categories', CategoryController::class)
        ->except(['create','edit','show','update']);

    Route::resource('/snacks', SnackController::class)
        ->except(['create','edit','show','update']);

    Route::resource('/home', OrderController::class)
        ->except(['create','edit','show','update']);
});

require __DIR__.'/auth.php';
