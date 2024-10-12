<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Barang;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    function daftarKategori(){
        $kategori = Kategori::all();
        return view ('barang.kategori', compact('kategori'));
    }
    public function showBarang($id)
    {
        $kategori = Kategori::with('barangs')->findOrFail($id); // Ambil kategori berdasarkan ID
        return view('kategori.show', compact('kategori')); // Anda bisa menampilkan barang di halaman terpisah
    }
}
