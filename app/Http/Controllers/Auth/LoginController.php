<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // تأكدي من استيراده
use Illuminate\Support\Facades\Auth; // تأكدي من إضافته

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'user') {
            return redirect()->route('home');
        }
        return redirect()->route('content');
       
    }
}
