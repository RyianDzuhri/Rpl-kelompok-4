<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    function tampil(){
        $barang = Barang::get();
        return view ('barang.tampil', compact('barang'));
    }
    function tambah(){
        return view ('barang.tambah');
    }
    function submit (Request $request){
        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->kategori_id = $request->kategori_id;
        $barang ->save();

        return redirect()->route('barang.tampil');
    }
    function edit ($id_barang){
        $barang = Barang::find($id_barang);
        return view('barang.edit', compact('barang'));
    }
    function update (Request $request, $id_barang){
        $barang = Barang::find($id_barang);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->kategori_id = $request->kategori_id;
        $barang ->update();

        return redirect()->route('barang.tampil');
    }
    function delete ($id_barang){
        $barang = Barang::find($id_barang);
        $barang->delete();
        return redirect()->route('barang.tampil');
    }
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