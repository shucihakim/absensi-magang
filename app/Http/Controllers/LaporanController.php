<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // Laporan Kegiatan Admin
    public function laporanKegiatan_Admin()
    {
        $laporan = Attendance::with('user')->with('room')->get();
        return view('admin/laporan_kegiatan', ['laporan' => $laporan]);
    }

    // laporan kehadiran admin
    public function laporanKehadiran_Admin()
    {
        $laporan = Attendance::with('user')->with('room')->get();
        return view('admin/laporan_kehadiran', ['laporan' => $laporan]);
    }
    // laporan kegiatan pembimbing
    public function laporanKegiatan_pembimbing()
    {
        $laporan = Attendance::with('user')->with('room')->get();
        return view('pembimbing/laporan_kegiatan', ['laporan' => $laporan]);
    }

    // laporan kehadiran pembimnbing
    public function laporanKehadiran_pembimbing()
    {
        $laporan = Attendance::with('user')->with('room')->get();
        return view('pembimbing/laporan_kehadiran', ['laporan' => $laporan]);
    }

    // laporan kegiatan mahasiswa
    public function laporanKegiatan_mahasiswa()
    {
        $laporan = Attendance::where('user_id', Auth::id())->with('user')->with('room')->get();
        return view('mahasiswa/laporan_kegiatan', ['laporan' => $laporan]);
    }

    // laporan kehadiran mahasiswa
    public function laporanKehadiran_mahasiswa()
    {
        $laporan = Attendance::where('user_id', Auth::id())->with('user')->with('room')->get();
        return view('mahasiswa/laporan_kehadiran', ['laporan' => $laporan]);
    }
}
