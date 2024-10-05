<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Table with Thick Border</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: grid;
            place-items: center; /* Memusatkan elemen */
            height: 100vh; /* Memastikan body memiliki tinggi penuh */
        }
        .table-container {
            width: 80%; /* Mengatur lebar kontainer */
            max-width: 800px; /* Maksimal lebar kontainer */
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
    <div class="table-container">
        <h4 style="text-align: center;">DAFTAR ID KATEGORI</h4>
        <a class="btn btn-success" href="{{ route('barang.tampil') }}">Halaman Utama</a>
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
</body>
</html>
