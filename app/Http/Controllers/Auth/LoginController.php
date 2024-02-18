<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the user input
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Authentication passed, regenerate session token to prevent session fixation
            $request->session()->regenerate();

            // Redirect to intended page or dashboard
            return redirect()->intended('/dashboard');
        }

        // Authentication failed, redirect back with error message
        return redirect()->back()->withErrors(['name' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        // Invalidate the user's session upon logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
