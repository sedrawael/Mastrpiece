<?php

namespace App\Http\Controllers;

use App\Models\PhotographerS;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $photographers = PhotographerS::all();
        return view('home', compact('photographers')); 
    }
}
