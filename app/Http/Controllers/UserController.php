<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function show()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|max:50',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;

        if ($request->hasFile('profile_image')) {
            $user->profile_image = file_get_contents($request->file('profile_image'));
        }

        $user->save();

        return redirect()->route('users.profile')->with('success', 'Profile updated successfully!');
    }

    public function destroy()
    {
        return view('users.delete');
    }

    public function delete()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect()->route('login')->with('success', 'Your account has been deleted successfully.');
    }
}
