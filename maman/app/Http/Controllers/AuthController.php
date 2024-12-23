<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (session('authenticated')) {
            return redirect()->intended('/');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|string',
        ]);

        if ($validated['password'] === env('APP_PASSWORD')) {
            session(['authenticated' => true]);
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(['password' => 'Mot de passe incorrect']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('authenticated');
        return redirect('/login');
    }
}
