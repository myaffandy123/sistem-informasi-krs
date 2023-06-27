<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil, pengguna berhasil login
            // return redirect()->intended('/mahasiswa/index');
            $role = auth()->user()->role;
            if ($role == 'mahasiswa') {
                return redirect()->route('mahasiswa');
            } else if ($role == 'dosen') {
                return redirect()->route('dosen');
            } else {
                return redirect()->route('admin');
            }
        } else {
            // Autentikasi gagal, pengguna gagal login
            return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
