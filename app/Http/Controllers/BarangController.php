<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pemasok;

class BarangController extends Controller
{
    // Menampilkan halaman dengan daftar barang
    public function tampil()
    {
        $barang = Barang::paginate(5); // Mengambil semua data barangu
        $kategori = Kategori::all(); // Mengambil semua data kategori
        $pemasok = Pemasok::all(); // Mengambil semua data pemasok

        return view('barang.tampil', compact('barang', 'kategori', 'pemasok')); // Mengirim data ke view
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id', // Memastikan kategori_id ada di tabel kategori
            'pemasok_id' => 'required|exists:pemasok,id' // Memastikan pemasok_id ada di tabel pemasok
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
            'kategori_id' => 'required|exists:kategori,id', // Memastikan kategori_id ada di tabel kategori
            'pemasok_id' => 'required|exists:pemasok,id' // Memastikan pemasok_id ada di tabel pemasok
        ]);

        // Mengupdate data di database
        $barang = Barang::findOrFail($id_barang);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'pemasok_id' => $request->pemasok_id,
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

    // Mencari barang berdasarkan Nama
    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input dari form pencarian
        // Cari barang berdasarkan nama_barang (mengabaikan huruf besar/kecil) dengan pagination
        $barang = Barang::where('nama_barang', 'LIKE', "%{$query}%")->paginate(5); // 5 item per halaman
        // Ambil kategori dan pemasok untuk ditampilkan di tampilan
        $kategori = Kategori::all();
        $pemasok = Pemasok::all();
    
        // Kembali ke view dengan hasil pencarian
        return view('barang.tampil', compact('barang', 'kategori', 'pemasok'));
    }    
}
