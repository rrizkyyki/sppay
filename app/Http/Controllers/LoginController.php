<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', ['title' => 'Masuk']);
    }

    public function authenticate(Request $request)
    {
        Auth::logout();
        Auth::guard('student')->logout();
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // method 1 for students
        // Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'));
        // method 2 students
        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        // admin and operator
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('alert', 'Percobaan Masuk Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
