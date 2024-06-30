<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('auth/login');
})->name("login");

Route::get('register', function () {
    return view('auth/register');
})->name("register");

Route::prefix('admin')->group(function() {
    Route::get('dashboard_1', function () {
        return view('admin/dashboard_1');
    });
    Route::get('pengguna', function () {
        return view('admin/pengguna');
    });



});

Route::prefix('Pembina')->group(function() {
    Route::get('dashboard_2', function () {
        return view('dashboard_2');
    });
    


});
