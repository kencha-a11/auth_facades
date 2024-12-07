<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function create(){
        return view('profile');
    }

    public function store(Request $request)
{
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'bio' => 'required|string|max:255',
            'profile_image' => 'required|image|mimes:jpeg,jpg,gif|max:2040'  // Match field name here
        ]);

        $imagePath = null;
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $imagePath = $request->file('profile_image')->store('profiles', 'public');
        }

        Profile::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'age' => $validated['age'],
            'bio' => $validated['bio'],
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Profile created successfully');
    }


}
