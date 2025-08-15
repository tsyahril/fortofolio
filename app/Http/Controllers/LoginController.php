<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view('layouts.auth'); // ganti dengan nama view login kamu jika berbeda
    }
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('layouts.auth'); // sesuaikan dengan view login kamu
    }
public function loginAction(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->peran === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->peran === 'Anggota') { 
        } else {
            Auth::logout();
            return back()->with('error', 'Role tidak ditemukan.');
        }
    }

    return back()->with('error', 'Email atau password salah.');
}


    // Memproses login
   public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->peran === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->peran === 'Anggota') { 
        } else {
            Auth::logout();
            return back()->with('error', 'Role tidak ditemukan.');
        }
    }

    return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
