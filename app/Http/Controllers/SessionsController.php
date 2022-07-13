<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($attributes)) {
            session()->regenerate();
            return redirect('dashboard')->with(['success' => 'You are logged in.']);
        } else {
            if ($user = User::where('username', $attributes['email'])->first()) {
                Auth::login($user);
            }
            return redirect('dashboard')->with(['success' => 'You are logged in.']);
            // return back()->withErrors(['email' => 'Email or password invalid.'])->withInput();
        }
    }

    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success' => 'You\'ve been logged out.']);
    }
}
