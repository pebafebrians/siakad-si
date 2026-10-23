<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirect default setelah login (fallback)
Route::get('/dashboard', function () {
    return redirect()->route(auth()->user()->role . '.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route per role dengan middleware `role:xxx`
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::view('/dosen/dashboard', 'dosen.dashboard')->name('dosen.dashboard');
});

Route::middleware(['auth', 'role:dosen_wali'])->group(function () {
    Route::view('/dosen_wali/dashboard', 'dosen_wali.dashboard')->name('dosen_wali.dashboard');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::view('/mahasiswa/dashboard', 'mahasiswa.dashboard')->name('mahasiswa.dashboard');
});

Route::middleware(['auth', 'role:bendahara'])->group(function () {
    Route::view('/bendahara/dashboard', 'bendahara.dashboard')->name('bendahara.dashboard');
});

require __DIR__.'/auth.php';
