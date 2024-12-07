<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function registerForm(){
        return view('register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        return redirect()->route('profile.create', ['user'=>$user->id])->with('success', 'Registration successful');
    }

    public function loginForm(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (Auth::attempt($credentials)){
            Auth::login($user); // main purpose

            return redirect()->intended(route('dashboard'))
                ->with('success', 'Welcome back!');
        }

        return redirect()->route('loginForm');
    }

     public function dashboard(){

        return view('dashboard', ['user' => Auth::user()]);
     }

     public function logout(){
        Auth::logout();
        return redirect()->route('loginForm')->with('success', 'successful logout');
     }
}
