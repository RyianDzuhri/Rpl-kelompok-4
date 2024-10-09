<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .header {
            color: white;
            padding: 20px 0;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('images/bgkat.jpg') }}');
            background-size: cover;
            background-position: center;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }
        .sidebar-header {
            padding: 15px 20px;
            background-color: #444;
            color: white;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar a:hover {
            background-color: #ffcc00;
            color: black;
        }
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
        <a href="{{ route('barang.pemasok') }}">Daftar Pemasok</a>
        <a href="{{ route('barang.kategori') }}">Daftar Kategori</a>
    </div>

    <div class="content">
        <h4>DAFTAR BARANG</h4>
    <div class="header">
            <!-- Notifikasi untuk aksi yang berhasil -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Tambah Barang -->
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBarangModal">Tambah Barang</button>

            <!-- Tabel Daftar Barang -->
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->kategori_id }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editBarangModal"
                                        data-id="{{ $item->id_barang }}"
                                        data-nama_barang="{{ $item->nama_barang }}"
                                        data-harga="{{ $item->harga }}"
                                        data-stok="{{ $item->stok }}"
                                        data-kategori_id="{{ $item->kategori_id }}">
                                    Edit
                                </button>
                                <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah Barang -->
        <div class="modal fade" id="addBarangModal" tabindex="-1" role="dialog" aria-labelledby="addBarangModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBarangModalLabel">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <input type="number" class="form-control" id="kategori_id" name="kategori_id" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Barang -->
        <div class="modal fade" id="editBarangModal" tabindex="-1" role="dialog" aria-labelledby="editBarangModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBarangModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editBarangForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" id="editBarangId" name="id">
                            <div class="form-group">
                                <label for="editNamaBarang">Nama Barang</label>
                                <input type="text" class="form-control" id="editNamaBarang" name="nama_barang" required>
                            </div>
                            <div class="form-group">
                                <label for="editHarga">Harga</label>
                                <input type="number" class="form-control" id="editHarga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="editStok">Stok</label>
                                <input type="number" class="form-control" id="editStok" name="stok" required>
                            </div>
                            <div class="form-group">
                                <label for="editKategori">Kategori</label>
                                <input type="number" class="form-control" id="editKategori" name="kategori_id" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $('#editBarangModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var nama_barang = button.data('nama_barang');
                var harga = button.data('harga');
                var stok = button.data('stok');
                var kategori_id = button.data('kategori_id');

                var modal = $(this);
                modal.find('#editBarangId').val(id);
                modal.find('#editNamaBarang').val(nama_barang);
                modal.find('#editHarga').val(harga);
                modal.find('#editStok').val(stok);
                modal.find('#editKategori').val(kategori_id);

                $('#editBarangForm').attr('action', '/barang/' + id);
            });
        </script>
        </div>
    </div>
</body>
</html>
