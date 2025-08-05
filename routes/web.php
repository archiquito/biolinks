<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BiolinkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/logout', LogoutController::class)->name('logout');
    Route::get('/link/create', [LinkController::class, 'showLinkForm'])->name('link.create');
    Route::post('/link', [LinkController::class, 'store'])->name('link.store');
    Route::middleware('can:update,link')->group(function () {
        Route::get('/link/{link}/edit', [LinkController::class, 'edit'])->name('link.edit');
        Route::put('/link/{link}/update', [LinkController::class, 'update'])->name('link.update');
        Route::delete('/link/{link}', [LinkController::class, 'destroy'])->name('link.destroy');
        Route::patch('/link/{link}/up', [LinkController::class, 'updatePosition'])->name('link.positionUp');
        Route::patch('/link/{link}/down', [LinkController::class, 'updatePosition'])->name('link.positionDown');
    });
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

Route::get('/{user:handler}', BiolinkController::class);
