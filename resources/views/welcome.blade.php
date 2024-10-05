<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Barang</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.3.3-dist/css/bootstrap.css') }}">
</head>
<body>
    <h1 class="text-center mt-3">Aplikasi Manajemen Barang</h1>
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <a href="{{ route('barang.tampil') }}" class="btn btn-primary" style="padding: 15px 30px; font-size: 20px;">Mulai Kelola Barang</a>
    </div>       
</body>
</html>
