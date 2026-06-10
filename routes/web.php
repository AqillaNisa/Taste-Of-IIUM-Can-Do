<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\StallController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\StallPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::redirect('/login', '/admin/login');

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'create'])->name('login');
        Route::post('/login', [AuthController::class, 'store'])->name('admin.login.store');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('users', UserController::class)->except(['show'])->names('admin.users');
        Route::resource('stalls', StallController::class)->except(['show'])->names('admin.stalls');
        Route::resource('foods', FoodController::class)->except(['show'])->names('admin.foods');
        Route::post('/logout', [AuthController::class, 'destroy'])->name('admin.logout');
    });
});

Route::get('/mahallah/male', function () {
    return view('mahallah.male');
})->name('mahallah.male');

Route::get('/mahallah/female', function () {
    return view('mahallah.female');
})->name('mahallah.female');


//Route::get('/mahallah/{mahallah}', [StallPageController::class, 'show']);

//Route::get('/stall', function (){return view('stall');});

//Route::get('/stall/{mahallah}',function($mahallah){return view('stall', compact('mahallah'));})->name('stall');

Route::get('/stall/{mahallah}', [StallPageController::class, 'show'])->name('stall');
