<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');  // عرض صفحة تسجيل الدخول
    }

    public function login(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // تخزين بيانات تسجيل الدخول
        $credentials = $request->only('email', 'password');

        // محاولة تسجيل الدخول
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // إعادة توجيه المستخدم بناءً على دوره
            return $user->role === 'admin'
                ? redirect()->intended('/content')
                : redirect()->intended('/home');
        }

        // في حال فشل تسجيل الدخول
        return back()->with('error', 'بيانات الدخول غير صحيحة');
    }
}
