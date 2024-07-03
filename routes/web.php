<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::prefix('admin')->group(function() {
    Route::get('dashboard', function () {
        return view('admin/dashboard');
    })->name('admin.dashboard');

    Route::get('pengguna', function () {
        return view('admin/pengguna');
    })->name('admin.pengguna');

    Route::get('ruangan', [RuanganController::class, 'list'])->name('admin.ruangan');
    Route::post('ruangan/tambah', [RuanganController::class, 'create'])->name('admin.ruangan.tambah');
    Route::post('ruangan/edit', [RuanganController::class, 'update'])->name('admin.ruangan.edit');
    Route::post('ruangan/hapus', [RuanganController::class, 'delete'])->name('admin.ruangan.hapus');

    Route::get('lokasi', [LokasiController::class, 'lokasi_view'])->name('admin.lokasi');
    Route::post('lokasi/simpan', [LokasiController::class, 'lokasi_update'])->name('admin.lokasi.simpan');

    Route::get('laporan_kegiatan', function () {
        return view('admin/laporan_kegiatan');
    })->name('admin.laporan_kegiatan');

    Route::get('laporan_kehadiran', function () {
        return view('admin/laporan_kehadiran');
    })->name('admin.laporan_kehadiran');




});

Route::prefix('pembimbing')->group(function() {
    Route::get('dashboard', function () {
        return view('pembimbing/dashboard');    
    })->name('pembimbing.dashboard');

    Route::get('laporan_kegiatan', function () {
        return view('pembimbing/laporan_kegiatan');
    })->name('pembimbing.laporan_kegiatan');

    Route::get('laporan_kehadiran', function () {
        return view('pembimbing/laporan_kehadiran');
    })->name('pembimbing.laporan_kehadiran');

    
});


Route::prefix('mahasiswa')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'mahasiswa_dashboard'])->name('mahasiswa.dashboard');

    Route::get('absensi', function () {
        return view('mahasiswa/absensi');
    })->name('mahasiswa.absensi');

    Route::get('laporan_kegiatan', function () {
        return view('mahasiswa/laporan_kegiatan');
    })->name('mahasiswa.laporan_kegiatan');

    Route::get('laporan_kehadiran', function () {
        return view('mahasiswa/laporan_kehadiran');
    })->name('mahasiswa.laporan_kehadiran');



});
