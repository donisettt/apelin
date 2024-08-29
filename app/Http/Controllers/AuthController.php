<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cred = $request->validate([
            'username' => 'required|exists:users',
            'password' => 'required'
        ]);

        if (Auth::attempt($cred, $request->remember)) {
            $request->session()->regenerate();
            LogActivity::add('berhasil login');
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        LogActivity::add('Berhasil Logout');
        Auth::logout();
        return redirect()->route('login');
    }
}
