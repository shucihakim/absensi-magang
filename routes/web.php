<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login_view'])->name("login");
Route::post('login/process', [AuthController::class, 'login_process'])->name("login.process");
Route::get('register', [AuthController::class, 'register_view'])->name("register");
Route::post('register/process', [AuthController::class, 'register_process'])->name("register.process");
Route::get('home', [DashboardController::class, 'home'])->name("home");


// logout
Route::post('logout', [AuthController::class, 'logout'])->name("logout");

Route::prefix('admin')->group(function() {
    Route::get('login', [AuthController::class, 'loginAdmin_view'])->name("login");
    Route::post('login/process', [AuthController::class, 'loginAdmin_process'])->name("loginAdmin.process");
    
    Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('pengguna', [PenggunaController::class, 'view'])->name('admin.pengguna');
    Route::post('pengguna/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');
    Route::post('pengguna/edit', [PenggunaController::class, 'update'])->name('admin.pengguna.edit');
    Route::post('pengguna/hapus', [PenggunaController::class, 'delete'])->name('admin.pengguna.hapus');

    Route::get('ruangan', [RuanganController::class, 'list'])->name('admin.ruangan');
    Route::post('ruangan/tambah', [RuanganController::class, 'create'])->name('admin.ruangan.tambah');
    Route::post('ruangan/edit', [RuanganController::class, 'update'])->name('admin.ruangan.edit');
    Route::post('ruangan/hapus', [RuanganController::class, 'delete'])->name('admin.ruangan.hapus');

    Route::get('lokasi', [LokasiController::class, 'lokasi_view'])->name('admin.lokasi');
    Route::post('lokasi/simpan', [LokasiController::class, 'lokasi_update'])->name('admin.lokasi.simpan');

    Route::get('laporan_kegiatan', [LaporanController::class, 'laporanKegiatan_view'])->name('admin.laporan_kegiatan');
    Route::get('laporan_kehadiran', [LaporanController::class, 'laporanKehadiran_view'])->name('admin.laporan_kehadiran');


});

Route::prefix('pembimbing')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'pembimbingDashboard'])->name('pembimbing.dashboard');

    Route::get('laporan_kegiatan', function () {
        return view('pembimbing/laporan_kegiatan');
    })->name('pembimbing.laporan_kegiatan');

    Route::get('laporan_kehadiran', function () {
        return view('pembimbing/laporan_kehadiran');
    })->name('pembimbing.laporan_kehadiran');
});


Route::prefix('mahasiswa')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'mahasiswa_dashboard'])->name('mahasiswa.dashboard');

    Route::get('absensi', [AbsensiController::class, 'view'])->name('mahasiswa.absensi');

    Route::get('laporan_kegiatan', function () {
        return view('mahasiswa/laporan_kegiatan');
    })->name('mahasiswa.laporan_kegiatan');

    Route::get('laporan_kehadiran', function () {
        return view('mahasiswa/laporan_kehadiran');
    })->name('mahasiswa.laporan_kehadiran');
});
