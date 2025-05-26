<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function showLogin()
    {
        $userWithLogo = User::whereNotNull('logo')->first();

        $logoPath = $userWithLogo
            ? asset('uploads/logos/' . $userWithLogo->logo)
            : asset('images/asquarex-logo.png');
        return view("auth.login", compact('logoPath'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'admin_email' => ['required', 'string'],
            'admin_password' => ['required'],
        ]);

        $login_input = $request->input('admin_email');
        $login_type = filter_var($login_input, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $login_type => $login_input,
            'password' => $request->input('admin_password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/product-master');
        }

        return back()->withErrors([
            'login_error' => 'Invalid credentials.',
        ])->withInput($request->except('admin_password'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // or to login
    }

}
