<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    function daftarPemasok(){
        $pemasok = Pemasok::all();
        return view ('barang.pemasok', compact('pemasok'));
    }
    // Menyimpan pemasok baru
    public function store(Request $request) {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Simpan data ke database
        Pemasok::create($validated);
        return redirect()->route('barang.pemasok')->with('success', 'Pemasok berhasil ditambahkan');
    }

    // Memperbarui pemasok yang ada
    public function update(Request $request, $id) {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Temukan pemasok berdasarkan ID dan perbarui
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->update($validated);
        return redirect()->route('barang.pemasok')->with('success', 'Pemasok berhasil diperbarui');
    }

    // Menghapus pemasok
    public function destroy($id) {
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->delete();
        return redirect()->route('barang.pemasok')->with('success', 'Pemasok berhasil dihapus');
    }
}
