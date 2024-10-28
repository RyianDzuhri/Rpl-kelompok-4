<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah barang
        $jumlah_jenis_barang = Barang::distinct('nama_barang')->count();

        // Menghitung jumlah pemasok
        $jumlah_pemasok = Pemasok::count();

        // Menghitung jumlah kategori
        $jumlah_kategori = Kategori::count();

        // Mengirim data ke view
        return view('barang.dashboard', compact(
            'jumlah_jenis_barang',
            'jumlah_pemasok',
            'jumlah_kategori',
        ));
    }
}

