<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [BarangController::class, 'tampil'])->name('barang.tampil');
Route::get('/barang/tampil', [BarangController::class, 'tampil'])->name('barang.tampil');
Route::get('/barang/tambah', [BarangController::class, 'tambah'])->name('barang.tambah');
Route::post('/barang/submit', [BarangController::class, 'submit'])->name('barang.submit');
Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/update/{id_barang}', [BarangController::class, 'update'])->name('barang.update');
Route::post('/barang/delete/{id_barang}', [BarangController::class, 'delete'])->name('barang.delete');
Route::get('/kategori', [BarangController::class, 'daftarKategori'])->name('barang.kategori');
Route::get('/barang', [BarangController::class, 'daftarKategori'])->name('barang.kategori');
Route::get('/barang', [BarangController::class, 'cari'])->name('barang.cari');