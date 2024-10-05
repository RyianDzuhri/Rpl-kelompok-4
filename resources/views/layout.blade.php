<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Barang</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.3.3-dist/css/bootstrap.css') }}">
    <style>
        .header {
            background-color: #9B0000; /* Ganti dengan warna yang diinginkan */
            color: rgb(255, 255, 255); /* Warna teks */
            text-align: center; /* Mengatur teks di tengah */
            padding: 20px 0; /* Mengatur jarak atas dan bawah */
            width: 100%; /* Memastikan lebar penuh */
        }
        table {
            width: 100%; /* Memastikan tabel lebar penuh */
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px; /* Meningkatkan padding */
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
          Navigasi
        </div>
        <a href="{{ route('barang.tampil') }}">Inventaris Barang</a>
        <a href="{{ route('barang.kategori') }}">Lihat Kategori</a>
    </div>
    <div class="content">
        <div class="header">
            <h1>Inventaris Barang</h1>
        </div>
    </div>
    

    <div class="mt-4 container">
        @yield('konten')
    </div>
</body>
</html>
