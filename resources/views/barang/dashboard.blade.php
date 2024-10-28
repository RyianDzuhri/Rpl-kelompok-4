<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            Navigasi
        </div>
        <a href="{{ route('barang.dashboard') }}" class="{{ request()->routeIs('barang.dashboard') ? 'active' : '' }}">
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
    
    <main class="content">
        <!-- Hero Text -->
        <div class="hero-text">
            <h1>Kelola Inventaris dengan Mudah dan Cepat</h1>
            <p>Menyederhanakan manajemen produk Anda dengan sistem yang efisien dan cepat.</p>
        </div>
        <div class="container">
            <div class="content-wrapper">
                <h1>Dashboard</h1>
                <div class="dashboard-cards">
                    <div class="card purple">
                        <h2>{{ $jumlah_jenis_barang }}</h2>
                        <p>Jumlah Barang</p>
                    </div>
                    <div class="card green">
                        <h2>{{ $jumlah_pemasok }}</h2>
                        <p>Jumlah Pemasok</p>
                    </div>
                    <div class="card teal">
                        <h2>{{ $jumlah_kategori }}</h2>
                        <p>Jumlah Kategori</p>
                    </div>
                    <div class="card j">
                        <h2>{{ $jumlah_kategori }}</h2>
                        <p>Jumlah Kategori</p>
                    </div>
                </div>
                <div class="dashboard-cards">
                    <div class="card blue">
                        <h2>cek</h2>
                        <p>Jumlah Barang</p>
                    </div>
                    <div class="card lol">
                        <h2>cek</h2>
                        <p>Jumlah Barang</p>
                </div>
                </div>
                <div class="dashboard-cards">
                    <div class="card p">
                        <h2>cek</h2>
                        <p>Jumlah Barang</p>
                    </div>
                    <div class="card lo">
                        <h2>cek</h2>
                        <p>Jumlah Barang</p>
                    </div>
                        <div class="card s">
                            <h2>cek</h2>
                            <p>Jumlah Barang</p>
                        </div>
                        <div class="card l">
                            <h2>cek</h2>
                            <p>Jumlah Barang</p>
                        </div>
            </div>
            <div class="dashboard-cards">
                <div class="card b">
                    <h2>cek</h2>
                    <p>Jumlah Barang</p>
                </div>
        </div>
    </main>
</body>
</html>
