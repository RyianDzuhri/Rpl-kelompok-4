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
    public function cari(Request $request) {
        $keyword = $request->input('cari');
         
        // Jika tidak ada keyword, kembalikan tampilan tanpa barang
        if (empty($keyword)) {
            $barang = collect(); // Mengembalikan koleksi kosong
        } else {
            // Jika ada keyword, cari barang berdasarkan kategori_id
            $barang = Barang::where('kategori_id', 'like', "%" . $keyword . "%")->paginate(2);
        }
    
        return view('barang.tampil', compact('barang'));
    }
}
