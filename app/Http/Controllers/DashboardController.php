<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\PhotographerS;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $bookingsToday = Booking::whereDate('date', $today)->count();
        $totalUsers = User::count();

        $bookingsChart = Booking::selectRaw('DATE(date) as day, COUNT(*) as total')
            ->where('date', '>=', Carbon::now()->subDays(6))
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $photographersChart = PhotographerS::selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        return view('content', compact(
            'bookingsToday',
            'totalUsers',
            'bookingsChart',
            'photographersChart'
        ));
    }
}
