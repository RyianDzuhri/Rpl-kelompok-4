<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            Navigasi
        </div>
        <a href="{{ route('barang.dashboard') }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('barang.tampil') }}" class="{{ request()->routeIs('barang.tampil') ? 'active' : '' }}">
            <i class="fas fa-box"></i> Data Barang
        </a>
        <a href="{{ route('barang.pemasok') }}" class="{{ request()->routeIs('barang.pemasok') ? 'active' : '' }}">
            <i class="fas fa-truck"></i> Pemasok
        </a>
        <a href="{{ route('barang.kategori') }}" class="{{ request()->routeIs('barang.kategori') ? 'active' : '' }}">
            <i class="fas fa-tags"></i> Kategori
        </a>
    </div> 
    <div class="content">
        <div class="title-container">
            <h4 class="title">DAFTAR KATEGORI</h4>
        </div>
        <div class="title-container">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->deskripsi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
</body>
</html>
