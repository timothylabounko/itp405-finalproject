<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viewer;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:viewers',
            'password' => 'required|confirmed|min:8',
        ]);

        Viewer::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
