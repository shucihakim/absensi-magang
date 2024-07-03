<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register_view()
    {
        return view('auth.register');
    }

    public function register_process(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];
        $message = [
            'name.required' => 'Form nama masih kosong',
            'email.required' => 'Form email masih kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Form password masih kosong',
        ];

        $request->validate($rules, $message);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil silahkan login!');
    }

    public function login_view()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            User::where('email', $request->email)->update([
                'status' => true,
            ]);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['Email atau password salah!']);
        }
    }


    // login admin
    public function loginAdmin_view() {
        return view('auth.login_admin');
    }

    public function loginAdmin_process(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            User::where('email', Auth::user()->email)->update([
                'status' => true,
            ]);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['Email atau password salah!']);
        }
    }

    public function logout(Request $request) {
        User::where('email', Auth::user()->email)->update([
            'status' => false,
        ]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
    // admin
    public function logout_admin(Request $request) {
        User::where('email', Auth::user()->email)->update([
            'status' => false,
        ]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logout berhasil!');
    }
}
