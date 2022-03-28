<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {

    // login, middleware : guest
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    //register, middleware : guest
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// logout, middlewre auth
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');