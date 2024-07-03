<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Laporan Kegiatan Admin
    public function laporanKegiatan_Admin() {
        return view('admin/laporan_kegiatan');
    }

//     laporan kehadiran admin
    public function laporanKehadiran_Admin() {
        return view('admin/laporan_kehadiran');
    }
    //  laporan kegiatan pembimbing
    public function laporanKegiatan_pembimbing() {
        return view('pembimbing/laporan_kegiatan');
    }

//     laporan kehadiran pembimnbing
    public function laporanKehadiran_pembimbing() {
        return view('pembimbing/laporan_kehadiran');
    }

    //  laporan kegiatan mahasiswa
    public function laporanKegiatan_mahasiswa() {
        return view('mahasiswa/laporan_kegiatan');
    }

//     laporan kehadiran mahasiswa
    public function laporanKehadiran_mahasiswa() {
        return view('mahasiswa/laporan_kehadiran');
    }

}