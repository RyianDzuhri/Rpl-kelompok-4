<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    // Menampilkan halaman dengan daftar barang
    public function tampil()
    {
        $barang = Barang::all(); // Mengambil semua data barang
        $kategori = Kategori::all(); // Mengambil semua data kategori

        return view('barang.tampil', compact('barang', 'kategori')); // Mengirim data ke view
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id', // Pastikan kategori_id ada di tabel kategori
        ]);
        // Menyimpan data ke database
        Barang::create($validated);

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

    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input dari form pencarian
        $barang = Barang::where('kategori_id', $query)->get(); // Cari barang berdasarkan ID

        $kategori = Kategori::all(); // Ambil semua kategori untuk ditampilkan

        return view('barang.tampil', compact('barang', 'kategori')); // Kembali ke view dengan hasil pencarian
    }

}
