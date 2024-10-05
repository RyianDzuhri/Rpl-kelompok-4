<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Barang</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.3.3-dist/css/bootstrap.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('images/bgwel.jpg') }}'); /* Ganti dengan path ke gambar background */
            background-size: cover; /* Menutupi seluruh halaman */
            background-position: center; /* Memposisikan gambar di tengah */
        }
        .header-container {
            background-color: rgba(0, 0, 0, 0.5); /* Memberikan background hitam dengan transparansi */
            padding: 20px; /* Memberikan jarak di sekitar teks */
            border-radius: 8px; /* Membuat sudut sedikit melengkung */
            text-align: center; /* Memusatkan teks */
            width: fit-content; /* Menyesuaikan lebar dengan konten */
            margin: 0 auto; /* Memusatkan elemen di tengah halaman */
        }
        h1 {
            color: white; /* Mengubah warna tulisan menjadi putih */
            margin: 0; /* Menghapus margin default untuk h1 */
        }
        .btn-yellow {
            background-color: #ffcc00; /* Mengatur warna latar belakang tombol kuning */
            color: black; /* Mengatur warna teks tombol menjadi hitam */
        }
        .btn-yellow:hover {
            background-color: #ffd700; /* Mengatur warna tombol saat hover */
        }
    </style>
</head>
<body>
    <div class="header-container">
        <h1>Aplikasi Manajemen Barang</h1>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <a href="{{ route('barang.tampil') }}" class="btn btn-yellow" style="padding: 15px 30px; font-size: 20px;">Mulai Kelola Barang</a>
    </div>       
</body>
</html>
