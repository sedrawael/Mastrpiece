<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = $user->bookings;  

        return view('index', compact('bookings'));
    }
}
