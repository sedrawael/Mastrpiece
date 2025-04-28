<?php
    

    use App\Http\Controllers\ContentController;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotographersController;
use App\Http\Controllers\BookingController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/book-now', [BookingController::class, 'create'])->name('book.now');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/picture', [ProfileController::class, 'deletePicture'])->name('profile.picture.delete');

    Route::get('/password/change', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/password/change', [ProfileController::class, 'changePassword'])->name('password.update');
});

Route::resource('photographers', PhotographersController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // ✅ تصحيح
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    
    Route::get('/index', [ContentController::class, 'index'])->middleware('auth')->name('index');

    Route::middleware(['auth'])->group(function () {
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    });
});
