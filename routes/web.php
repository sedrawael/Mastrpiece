<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('SignUp');
})->name('register');
Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/content', function () {
    return view('content');
})->middleware('auth')->name('content'); 

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::get('/book-now', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    return view('book now');
})->name('book.now');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/picture', [ProfileController::class, 'deletePicture'])->name('profile.picture.delete');




    Route::middleware('auth')->group(function () {
    Route::get('/password/change', [ProfileController::class, 'showChangePasswordForm'])
    ->name('password.change');
    
Route::post('/password/change', [ProfileController::class, 'changePassword'])
    ->name('password.update');


    Route::get('/password/change', [ProfileController::class, 'showChangePasswordForm'])
     ->name('password.change');
});});