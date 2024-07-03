<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home() {
        if (Auth::check()) {
            $user = Auth::user();
            $role = strtolower($user->role);
            if ($role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role == 'pembimbing') {
                return redirect()->route('pembimbing.dashboard');
            } elseif ($role == 'peserta') {
                return redirect()->route('mahasiswa.dashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
