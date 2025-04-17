<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        return view('show', compact('user'));
    }
    public function edit()
    {
        
        $user = Auth::user();
        return view('profile_edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
        ]);
    
        $user->update($validated);
    
        return redirect()->route('profile.show')
            ->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }
    
    public function updatePicture(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $user = Auth::user();
        
        // حذف الصورة القديمة
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }
        
        // حفظ الصورة الجديدة
        $path = $request->file('avatar')->store('profile_pictures', 'public');
        $user->update(['profile_picture' => $path]);
        
        return back()->with('success', 'تم تحديث الصورة بنجاح');
    }
    
    public function deletePicture()
    {
        $user = Auth::user();
        
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
            $user->update(['profile_picture' => null]);
        }
        
        return back()->with('success', 'تم حذف الصورة الشخصية بنجاح');
    }
}