<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;

// Halaman beranda (landing page)
Route::get('/', [DonasiController::class, 'home'])->name('home');

// Form donasi
Route::get('/donasi/baru', [DonasiController::class, 'create'])->name('donasi.create');

// Simpan donasi
Route::post('/donasi/simpan', [DonasiController::class, 'store'])->name('donasi.store');

// Riwayat donasi lengkap
Route::get('/donasi/riwayat', [DonasiController::class, 'history'])->name('donasi.history');