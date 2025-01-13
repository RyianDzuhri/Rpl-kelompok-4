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
}
