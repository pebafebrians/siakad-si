<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

// Prototipe lokal frontend saja; tambahkan autentikasi dan otorisasi sebelum digunakan pada aplikasi nyata.
Route::get('/prototype/mahasiswa', function () {
    return view('dashboard.mahasiswa');
})->name('prototype.mahasiswa');

// Prototipe lokal frontend saja; tambahkan autentikasi dan otorisasi sebelum digunakan pada aplikasi nyata.
Route::get('/prototype/dosen', function () {
    return view('dashboard.dosen');
})->name('prototype.dosen');

// Prototipe lokal frontend saja; belum dilindungi autentikasi/otorisasi dan harus diamankan sebelum penggunaan nyata.
Route::get('/prototype/dosen-wali', function () {
    return view('dashboard.dosen_wali');
})->name('prototype.dosen_wali');

// Prototipe lokal frontend saja; belum memiliki autentikasi/otorisasi dan wajib diamankan sebelum penggunaan nyata.
Route::get('/prototype/admin', function () {
    return view('dashboard.admin');
})->name('prototype.admin');

// Prototipe lokal frontend saja; belum dilindungi autentikasi/otorisasi dan wajib diamankan sebelum penggunaan nyata.
Route::get('/prototype/bendahara', function () {
    return view('dashboard.bendahara');
})->name('prototype.bendahara');
