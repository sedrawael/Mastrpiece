<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\PhotographerS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $photographers = PhotographerS::where('is_available', true)->get();
        return view('book now', compact('user', 'photographers'));
    }
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to make a booking.');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'event_type' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'photographer_id' => $request->photographer_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_type' => $request->event_type,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        
        return redirect()->route('home')->with('success', 'Your booking has been confirmed!');
    }

    
    public function index()
    {
        $bookings =Booking::all();
        return view('index', compact('bookings'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }}
