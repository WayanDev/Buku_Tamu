<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            Alert::success('Login Berhasil', 'Kamu berhasil login.')->autoClose(3000);
            return redirect()->route('dashboard'); 
        } else {
            Alert::error('Login Gagal', 'Pastikan Username dan Password benar.')->autoClose(3000);
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        Alert::info('Logout Berhasil', 'Kamu berhasil logout.')->autoClose(1000);
        return redirect()->route('login');
    }
}
