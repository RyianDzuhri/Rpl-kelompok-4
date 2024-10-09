<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Rute untuk manajemen barang
Route::get('/manajemen', [BarangController::class, 'manajamen'])->name('barang.tampil');
// Rute lainnya
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::put('/barang/{id_barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id_barang}', [BarangController::class, 'destroy'])->name('barang.destroy');


//Route untuk menampilkan pemasok
Route::get('/pemasok', [PemasokController::class, 'daftarPemasok'])->name('barang.pemasok');

Route::post('/pemasok', [PemasokController::class, 'store'])->name('pemasok.store'); // Rute untuk menyimpan pemasok baru
Route::put('/pemasok/{id}', [PemasokController::class, 'update'])->name('pemasok.update'); // Rute untuk memperbarui pemasok
Route::delete('/pemasok/{id}', [PemasokController::class, 'destroy'])->name('pemasok.destroy'); // Rute untuk menghapus pemasok

//Untuk Kategori
Route::get('/kategori', [KategoriController::class, 'daftarKategori'])->name('barang.kategori');
Route::get('/barang', [KategoriController::class, 'daftarKategori'])->name('barang.kategori');
Route::get('/barang', [KategoriController::class, 'cari'])->name('barang.cari');