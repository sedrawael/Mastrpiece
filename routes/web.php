<?php
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MessageController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotographersController;
use App\Http\Controllers\BookingController;
use App\Models\Booking;
use App\Models\PhotographerS;
use App\Models\User;
use Carbon\Carbon;
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
    // Get today's bookings
    $bookingsToday = Booking::whereDate('created_at', Carbon::today())->count();

    // Get total users
    $totalUsers = User::count();

    // Bookings chart (last 7 days)
    $bookingsChart = Booking::selectRaw('DATE(created_at) as day, COUNT(*) as total')
        ->where('created_at', '>=', Carbon::now()->subDays(6))
        ->groupBy('day')
        ->orderBy('day')
        ->get();

    // New photographers chart (last 7 days)
    $photographersChart = PhotographerS::selectRaw('DATE(created_at) as day, COUNT(*) as total')
        ->where('created_at', '>=', Carbon::now()->subDays(6))
        ->groupBy('day')
        ->orderBy('day')
        ->get();

    return view('content', compact('bookingsToday', 'totalUsers', 'bookingsChart', 'photographersChart'));
})->middleware(['auth', 'admin'])->name('content');







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


Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    
    Route::get('/index', [ContentController::class, 'index'])->middleware('auth')->name('index');

    Route::middleware(['auth'])->group(function () {
       
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    });
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    
    Route::post('/contact/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/contact/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/contact/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/contact/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::resource('contact', MessageController::class);
    Route::currentRouteName() == 'route.name' ? 'active bg-gradient-primary text-white' : 'text-dark' ;


});








Route::get('/admin/profile', [AdminProfileController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');






Route::get('/dashboard/users', [UserController::class, 'usersList'])->name('dashboard.users');
Route::delete('/dashboard/users/{id}', [UserController::class, 'deleteUser'])->name('dashboard.users.delete');
Route::get('/dashboard/users/{id}/edit', [UserController::class, 'editUser'])->name('dashboard.users.edit');
Route::put('/dashboard/users/{id}', [UserController::class, 'updateUser'])->name('dashboard.users.update');
