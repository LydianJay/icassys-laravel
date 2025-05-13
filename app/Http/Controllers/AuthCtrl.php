<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AuthCtrl extends Controller
{
    public function index() {


        return view('pages.auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
            'captcha'   => 'required|captcha'
            
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->with([
            'invalid' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout() {
        Auth::logout();
        session()->invalidate();
        session()->regenerate();
    }
}
