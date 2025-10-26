<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::prefix('auth')->name('auth.')->middleware('checkLogin')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'login'])->name('login.index');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    
    Route::get('/register', [AuthController::class, 'register'])->name('register.index');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    //quen mat khau
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password.index');
    Route::post('/forgot-password', [AuthController::class, 'forgotPasswordPost'])->name('forgot-password.post');

    Route::post('/reset-password', [AuthController::class, 'resetPasswordPost'])->name('reset-password.post');

    });
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout.post');
    
    Route::get('/very/{token}', [AuthController::class, 'veryEmail'])->name('auth.very');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
 ?>