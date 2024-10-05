@extends('layout')

@section('konten')
<div class="content">
    <div class="d-flex justify-content-between align-items-center">
        <h4>List Barang</h4>
        <form action="{{ route('barang.cari') }}" method="GET">
            <div class="d-flex align-items-center ms-auto">
                <input type="text" name="cari" class="form-control me-2" placeholder="Cari berdasarkan ID Kategori" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </form>
        <div class="d-flex">
            <a class="btn btn-success" href="{{ route('barang.tambah') }}">Tambah Barang</a>
        </div>
    </div>



    <table class="table mt-3">
        <tr class="table-active">
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>ID Kategori</th>
            <th>Aksi</th>
        </tr>
    @if ($barang->count())
        @foreach ($barang as $no => $data)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>Rp. {{ number_format($data->harga, 2, ',', '.') }}</td>
                <td>{{ $data->stok }}</td>
                <td>{{ $data->kategori_id }}</td>
                <td>
                    <a href="{{ route('barang.edit', $data->id_barang) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('barang.delete', $data->id_barang) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                    </form>
                </td>
            </tr>        
        @endforeach
    @else
        <tr>
            <td colspan="6" class="text-center">Tidak ada barang yang ditemukan.</td>
        </tr>
    @endif

    </table>
</div>


@endsection