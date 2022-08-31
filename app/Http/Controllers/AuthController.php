<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function registration()
    {
        return view('registration');
    }

    public function login()
    {
        return view('login');
    }

    public function login_check(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'The',
        ]);

    }

    public function registration_check(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required|max:20|min:5',
            'email' => 'required|max:20|min:5',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
