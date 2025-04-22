<?php

namespace App\Http\Controllers;
use App\Models\Photographer;

use App\Models\Photographers;
use Illuminate\Http\Request;

class PhotographersController extends Controller
{
    public function index()
    {
        $photographers = Photographers::all();
        return view('photographers.index', compact('photographers'));
    }

    public function create()
    {
        return view('photographers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:photographers',
            'phone' => 'required',
            'specialty' => 'required',
            'price_per_hour' => 'required|numeric',
            'is_available' => 'boolean',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photographer = new Photographers();
        $photographer->name = $request->name;
        $photographer->email = $request->email;
        $photographer->phone = $request->phone;
        $photographer->specialty = $request->specialty;
        $photographer->price_per_hour = $request->price_per_hour;
        $photographer->is_available = $request->has('is_available') ? true : false;
        $photographer->bio = $request->bio;

        if ($request->hasFile('profile_image')) {
            $photographer->profile_image = $request->file('profile_image')->store('photographers', 'public');
        }

        $photographer->save();

        return redirect()->route('photographers.index')->with('success', 'Photographer created successfully!');
    }

    public function show($id)
    {
        $photographer = Photographers::findOrFail($id);
        return view('photographers.show', compact('photographer'));
    }
    public function edit($id)
    {
        $photographer = Photographers::findOrFail($id);
        return view('photographers.edit', compact('photographer'));
    }

    public function update(Request $request, $id)
    {
        $photographer = Photographers::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:photographers,email,' . $photographer->id,
            'phone' => 'required',
            'specialty' => 'required',
            'price_per_hour' => 'required|numeric',
            'is_available' => 'boolean',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photographer->name = $request->name;
        $photographer->email = $request->email;
        $photographer->phone = $request->phone;
        $photographer->specialty = $request->specialty;
        $photographer->price_per_hour = $request->price_per_hour;
        $photographer->is_available = $request->has('is_available') ? true : false;
        $photographer->bio = $request->bio;

        if ($request->hasFile('profile_image')) {
            $photographer->profile_image = $request->file('profile_image')->store('photographers', 'public');
        }

        $photographer->save();

        return redirect()->route('photographers.index')->with('success', ' Photographer updated successfully!!');
    }
    public function destroy($id)
    {
        $photographer = Photographers::findOrFail($id);
        $photographer->delete();

        return redirect()->route('photographers.index')->with('success', 'Photographer deleted successfully!');
    }
}
