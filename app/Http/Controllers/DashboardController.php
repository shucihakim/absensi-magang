<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home() {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'Pembimbing') {
                return redirect()->route('pembimbing.dashboard');
            } elseif ($user->role == 'Peserta') {
                return redirect()->route('mahasiswa.dashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
