<?php

namespace App\Http\Controllers\Auth;

use App\Helper\Enums\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
        $credentials = Validator::make($request->all(), [
            'email' => 'required|email',
            'password'  => 'required|min:6',
        ]);

        if ($credentials->fails()) {
            return redirect()->back()->withErrors($credentials);
        }

        if ($user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]));

        if ($user) {
            if (Auth::user()->role_id == UserRole::ADMIN) {
                $request->session()->regenerate();
                return redirect()->intended('admin')->with('success', 'You are logged as Administrator');
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }

    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out');
    }
}
