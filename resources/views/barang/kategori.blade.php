<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            height: 100vh; /* Memastikan body memiliki tinggi penuh */
            margin: 0; /* Menghapus margin default */
            background-image: url('{{ asset('images/bgkat.jpg') }}'); /* Ganti dengan path ke gambar background */
            background-size: cover; /* Menutupi seluruh halaman */
            background-position: center; /* Memposisikan gambar di tengah */
        }

       /* Style sidebar */
       .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333; /* Abu-abu gelap */
            padding-top: 20px;
        }

        /* Sidebar Header */
        .sidebar-header {
            padding: 15px 20px;
            background-color: #444;
            color: white;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Sidebar links */
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Hover effect for all links */
        .sidebar a:hover {
            background-color: #ffcc00; /* Kuning saat hover */
            color: black; /* Ubah warna teks jadi hitam saat hover */
        }

        /* Page content */
        .content {
            margin-left: 250px; /* Memberikan ruang untuk sidebar */
            flex: 1; /* Mengisi sisa ruang */
            display: flex; /* Menggunakan flexbox untuk memusatkan konten */
            justify-content: center; /* Memusatkan secara horizontal */
            align-items: center; /* Memusatkan secara vertikal */
            padding: 20px;

        }

        .table-container {
            width: 100%; /* Memastikan kontainer menggunakan lebar penuh */
            max-width: 800px; /* Maksimal lebar kontainer */
            text-align: center; /* Memusatkan teks di dalam kontainer */
        }

        /* CSS untuk mempertebal border tabel */
        table {
            border-collapse: collapse; /* Menyatukan border antar sel */
        }
        .table-bordered {
            border: 1px solid #000 !important; /* Border luar tabel dengan !important */
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #000 !important; /* Border sel tabel dengan !important */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            Navigasi
        </div>
        <a href="{{ route('barang.tampil') }}">Inventaris Barang</a>
        <a href="{{ route('barang.pemasok') }}">Daftar Pemasok</a>
        <a href="{{ route('barang.kategori') }}">Daftar Kategori</a>
    </div>    
    <div class="content">
        <div class="table-container">
            <h4>DAFTAR ID KATEGORI</h4>
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
