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

// هنا تعريف مجموعة من المسارات الخاصة بالملف الشخصي
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // عرض الملف الشخصي
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // تعديل الملف الشخصي
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); // تحديث الملف الشخصي
    Route::delete('/profile/picture/delete', [ProfileController::class, 'deletePicture'])->name('profile.picture.delete'); // حذف الصورة الشخصية
});
