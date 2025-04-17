<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|max:2048'
        ]);
    
        // إذا في صورة جديدة
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }
    
            $path = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $path;
            $user->save(); // ضروري لحفظ مسار الصورة
        }
    
        // تحديث باقي المعلومات بما فيها الهاتف حتى لو فارغ
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    
        return redirect()->route('profile.show')->with('success', 'تم تحديث الملف الشخصي');
    }
        public function deletePicture()
    {
        $user = Auth::user();

        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }

        return redirect()->route('profile.show')->with('success', 'تم حذف الصورة الشخصية');
    }
}
