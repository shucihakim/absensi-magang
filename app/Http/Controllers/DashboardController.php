<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rooms;
use App\Models\User;
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

    /*
        ADMIN
    */
    public function adminDashboard() {
        $total_pengguna = User::count();
        $total_kehadiran = Attendance::count();
        $total_ruangan = Rooms::count();
        $absensi = Attendance::with('user')->with('room')->get();
        $data = [
            'total_pengguna' => $total_pengguna,
            'total_kehadiran' => $total_kehadiran,
            'total_ruangan' => $total_ruangan,
            'absensi' => $absensi,
        ];
        return view('admin/dashboard', $data);
    }   

    /*
        PEMBIMBING
    */
    public function pembimbingDashboard() {
        $total_peserta = User::where('role', 'peserta')->count();
        $total_kehadiran = Attendance::count();
        $total_ruangan = Rooms::count();
        $ruangan = Rooms::all();
        $absensi = Attendance::with('user')->with('room')->get();
        $data = [
            'total_peserta' => $total_peserta,
            'total_kehadiran' => $total_kehadiran,
            'total_ruangan' => $total_ruangan,
            'ruangan' => $ruangan,
            'absensi' => $absensi,
        ];
        return view('pembimbing/dashboard', $data);        
    }  

    /*
        PESERTA
    */
    public function mahasiswa_dashboard() {
        $total_kehadiran = Attendance::where('user_id', Auth::id())->count();
        $total_ruangan = Rooms::count();
        $absensi = Attendance::where('user_id', Auth::id())->with('user')->get();
        $data = [
            'total_kehadiran' => $total_kehadiran,
            'total_ruangan' => $total_ruangan,
            'absensi' => $absensi,
        ];
        return view('mahasiswa/dashboard', $data);
    }
}
