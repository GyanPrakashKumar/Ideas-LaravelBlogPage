<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store()
    {
        $validate = request()->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:5',
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
        ]);

        return redirect()->route('dashboard')->with('success', 'Account created successfully');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        // dd(request()->all());

        $validate = request()->validate([
            'email' => 'required',
            'password' => 'required|min:5',
        ]);

        // validate data from database
        if (auth()->attempt($validate)) {
            request()->session()->regenerate(); // delete the session if exist(prev user) and regenerete
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        return redirect()->route('login')->withErrors(['email' => 'Email not exist']);
    }
    
    public function logout()
    {
        auth()->logout();

        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully');
    }
}
