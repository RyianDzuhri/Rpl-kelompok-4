<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{ asset('css/kategori.css') }}" rel="stylesheet">
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
        <div class="row">
            @foreach($kategori as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_kategori }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#barangModal{{ $item->id }}">Lihat Barang</a>
                    </div>
                </div>
            </div>

            <!-- Modal untuk setiap kategori -->
            <div class="modal fade" id="barangModal{{ $item->id }}" tabindex="-1" aria-labelledby="barangModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="barangModalLabel{{ $item->id }}">Barang dalam Kategori: {{ $item->nama_kategori }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- Tambahkan barang sesuai kategori -->
                                @foreach($item->barangs as $barang)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                                            <p class="card-text">Harga: Rp {{ number_format($barang->harga, 0, ',', '.') }}</p>
                                            <p class="card-text">Stok: {{ $barang->stok }}</p>
                                            <p class="card-text">ID Kategori: {{ $barang->kategori_id }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>
