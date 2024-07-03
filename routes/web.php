<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login_view'])->name("login");
Route::get('regi    ster', [AuthController::class, 'register_view'])->name("register");
Route::post('register/process', [AuthController::class, 'register_process'])->name("register.process");

Route::prefix('admin')->group(function() {
    Route::get('dashboard', function () {
        return view('admin/dashboard');
    })->name('admin.dashboard');
    Route::get('pengguna', function () {
        return view('admin/pengguna');
    })->name('admin.pengguna');

    Route::get('ruangan', function () {
        return view('admin/ruangan');
    })->name('admin.ruangan');

    Route::get('lokasi', function () {
        return view('admin/lokasi');
    })->name('admin.lokasi');

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
    Route::get('dashboard', function () {
        return view('mahasiswa/dashboard');
    })->name('mahasiswa.dashboard');

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
