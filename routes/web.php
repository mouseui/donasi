<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;

Route::get('/', [DonasiController::class, 'index'])->name('home');
Route::get('/donasi/baru', [DonasiController::class, 'create'])->name('donasi.create');
Route::post('/donasi/simpan', [DonasiController::class, 'store'])->name('donasi.store');
Route::get('/donasi/riwayat', [DonasiController::class, 'index'])->name('donasi.history');