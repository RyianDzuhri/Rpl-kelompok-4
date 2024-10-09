<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Menampilkan halaman dengan daftar barang
    function manajamen(){
        $barang = Barang::all(); // Mengambil semua data barang
        return view('barang.tampil', compact('barang')); // Menampilkan view dengan data barang
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori_id' => 'required|integer',
        ]);

        // Menyimpan data ke database
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('barang.tampil')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Mengedit barang
    public function update(Request $request, $id_barang)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori_id' => 'required|integer',
        ]);

        // Mengupdate data di database
        $barang = Barang::findOrFail($id_barang);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('barang.tampil')->with('success', 'Barang berhasil diperbarui!');
    }

    // Menghapus barang
    public function destroy($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        $barang->delete();

        return redirect()->route('barang.tampil')->with('success', 'Barang berhasil dihapus!');
    }
}
