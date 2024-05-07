<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Viewer;

class BusinessLoginController extends Controller
{
    /**
     * Show the login form for businesses.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login', ['status' => session('status')]);
    }

    /**
     * Handle the business login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Log out any authenticated user first
        Auth::logout();

        $credentials = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            session()->flash('status', 'Login successful!');
            return redirect()->intended('/arcgis');
        }

        session()->flash('status', 'Invalid username or password.');
        return redirect()->route('login')->withInput();
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
