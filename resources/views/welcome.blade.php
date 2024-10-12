<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Barang</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.3.3-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('images/bgkat2.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .header-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }
        h1 {
            color: white;
            margin: 0;
            font-size: 2.5rem;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.8);
        }
        .btn-yellow {
            background: linear-gradient(90deg, #ffcc00, #ffd700);
            color: black;
            padding: 15px 30px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            transition: background 0.4s, transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
        }
        .btn-yellow:hover {
            background: linear-gradient(90deg, #ffd700, #ffcc00);
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        .btn-yellow i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <h1>Aplikasi Manajemen Aksesoris Hp</h1>
    </div>
    <div class="d-flex justify-content-center align-items-start" style="height: 70vh;"> <!-- Mengubah height dari 80vh menjadi 70vh -->
        <a href="{{ route('barang.dashboard') }}" class="btn btn-yellow" style="margin-top: 20px;"> <!-- Menambahkan margin-top -->
            <i class="fas fa-box"></i>
            Mulai Mengelola
        </a>
    </div>       
</body>
</html>
