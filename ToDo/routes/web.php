<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::get('login', [AuthManager::class, 'login'])->name('login');
Route::post('login', [AuthManager::class, 'loginpost'])->name('login.post');

Route::get('register', [AuthManager::class, 'register'])->name('register');
Route::post('register', [AuthManager::class, 'registerpost'])->name('register.post');

Route::post('logout', [AuthManager::class, 'logout'])->name('logout');
