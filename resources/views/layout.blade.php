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
            width: 60%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header text-center">
        <span onclick="window.location='{{ route('barang.tampil') }}'" style="cursor: pointer; font-size: 2rem;">TABEL DAFTAR BARANG</span>
    </div>
    

    <div class="mt-4 container">
        @yield('konten')
    </div>
</body>
</html>
