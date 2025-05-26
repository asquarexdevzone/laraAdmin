<?php

namespace App\Http\Controllers\Functionalities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Get the currently authenticated admin user
        return view('admin.profile-master', compact('user'));
    }

    public function updateprofile(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',  // 'confirmed' expects password_confirmation field
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        $user->name = $request->input('username');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($user->logo && file_exists(public_path('uploads/logos/' . $user->logo))) {
                unlink(public_path('uploads/logos/' . $user->logo));
            }

            $file = $request->file('logo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/logos'), $filename);
            $user->logo = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');

    }

}
