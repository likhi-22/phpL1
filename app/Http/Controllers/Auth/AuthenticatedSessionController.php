<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class AuthenticatedSessionController extends Controller
{
    public function __construct()
    {
    }
    public function create()
    {
        return view('auth.login');
    }
        public function store(Request $request): RedirectResponse
    {
        $credentials= $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required'],
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email'=> 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
