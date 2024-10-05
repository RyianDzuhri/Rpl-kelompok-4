@extends('layout')

@section('konten')
<div class="content">
    <h4>Edit Barang</h4>
    <form action="{{ route('barang.update', $barang->id_barang) }}" method="post">
        @csrf
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control">
        <label>Harga</label>
        <input type="number" name="harga" value="{{ $barang->harga }}" class="form-control">
        <label>Stok</label>
        <input type="number" name="stok" value="{{ $barang->stok }}" class="form-control">
        <div> 
            <label>Kategori Barang</label>
            <select name="kategori_id" class="form-control">
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="1" {{ $barang->kategori_id == 1 ? 'selected' : '' }}>Casing HP</option>
                <option value="2" {{ $barang->kategori_id == 2 ? 'selected' : '' }}>Pelindung Layar</option>
                <option value="3" {{ $barang->kategori_id == 3 ? 'selected' : '' }}>Charger dan Kabel Data</option>
                <option value="4" {{ $barang->kategori_id == 4 ? 'selected' : '' }}>Earphone dan Headphone</option>
            </select>
            
        </div>

        <button class="btn btn-primary mt-3">Edit</button>
    </form>
</div>


@endsection