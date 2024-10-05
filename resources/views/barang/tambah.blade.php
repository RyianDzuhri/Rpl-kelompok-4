@extends('layout')

@section('konten')
<div class="content">
    <h4>Tambah Barang</h4>
    <form action="{{ route('barang.submit') }}" method="post">
        @csrf
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control">
        <div> 
            <label>Kategori Barang</label>
            <select name="kategori_id" class="form-control">
                <option value="" disabled selected> </option>
                <option value="1">Casing HP</option>
                <option value="2">Pelindung Layar</option>
                <option value="3">Charger dan Kabel Data</option>
                <option value="4">Earphone dan Headphone</option>
            </select>
        </div>
        <button class="btn btn-primary mt-3">Tambahkan</button>
    </form>
</div>


@endsection