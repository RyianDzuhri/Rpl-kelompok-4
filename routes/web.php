<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route untuk manajemen barang
Route::get('/tampil', [BarangController::class, 'tampil'])->name('barang.tampil');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::put('/barang/{id_barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id_barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::get('/barang/search', [BarangController::class, 'search'])->name('barang.search');

//Route untuk menampilkan pemasok
Route::get('/pemasok', [PemasokController::class, 'daftarPemasok'])->name('barang.pemasok');
Route::post('/pemasok', [PemasokController::class, 'store'])->name('pemasok.store'); // Rute untuk menyimpan pemasok baru
Route::put('/pemasok/{id}', [PemasokController::class, 'update'])->name('pemasok.update'); // Rute untuk memperbarui pemasok
Route::delete('/pemasok/{id}', [PemasokController::class, 'destroy'])->name('pemasok.destroy'); // Rute untuk menghapus pemasok

//Route untuk Kategori
Route::get('/kategori', [KategoriController::class, 'daftarKategori'])->name('barang.kategori');
Route::get('/barang', [KategoriController::class, 'daftarKategori'])->name('barang.kategori');
Route::get('/barang', [KategoriController::class, 'cari'])->name('barang.cari');

//Route untuk Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('barang.dashboard');
