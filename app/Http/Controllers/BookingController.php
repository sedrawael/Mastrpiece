<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        
        return view('book now', compact('user'));
    }
            public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'event_type' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_type' => $request->event_type,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
