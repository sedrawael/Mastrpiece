<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// مسار التسجيل
Route::get('/register', function () {
    return view('SignUp');
})->name('register');
Auth::routes();
Route::post('/register', [RegisterController::class, 'register']);

// مسار تسجيل الدخول باستخدام LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// مسار لوحة التحكم (Dashboard) للمسؤولين فقط
Route::get('/content', function () {
    return view('content');
})->middleware('auth')->name('content'); // ✅ أضفنا اسمًا للمسار

// مصادقة Laravel الافتراضية
Auth::routes();

// إعادة توجيه المستخدم بعد تسجيل الدخول حسب دوره
Route::get('/home', [HomeController::class, 'index'])->name('home');

// مسار تسجيل الخروج
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // توجيه المستخدم إلى الصفحة الرئيسية بعد تسجيل الخروج
})->name('logout');


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); // ✅ يرجع المستخدم إلى الصفحة الرئيسية بعد تسجيل الخروج
})->name('logout');


Route::get('/book-now', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    return view('book now');
})->name('book.now');