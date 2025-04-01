<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('SignUp');
})->name('register');

Route::get('/book-now', function () {
    return view('book now');
});

Route::get('/layout', function () {
    return view('layouts.layout');
});

Route::get('/content', function () {
    return view('content');
});

// مسارات تسجيل الدخول
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
