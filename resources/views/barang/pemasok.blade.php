<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemasok</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .header {
            color: rgb(255, 255, 255); /* Warna teks */
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
        <a href="{{ route('barang.pemasok') }}">Daftar Pemasok</a>
        <a href="{{ route('barang.kategori') }}">Daftar Kategori</a>
    </div>
<div class="content">
    <h4>DAFTAR PEMASOK</h4>
    <div class="header">
        <!-- Notifikasi untuk aksi yang berhasil -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSupplierModal">Tambah Pemasok</button>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pemasok</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemasok as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSupplierModal"
                                    data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama }}"
                                    data-alamat="{{ $item->alamat }}"
                                    data-telepon="{{ $item->telepon }}"
                                    data-email="{{ $item->email }}">
                                Edit
                            </button>
                            <form action="{{ route('pemasok.destroy', $item->id) }}" method="POST" style="display:inline;">
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

    <!-- Modal Tambah Pemasok -->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplierModalLabel">Tambah Pemasok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pemasok.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Pemasok</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
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

    <!-- Modal Edit Pemasok -->
    <div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSupplierModalLabel">Edit Pemasok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editSupplierForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="editSupplierId" name="id">
                        <div class="form-group">
                            <label for="editNama">Nama Pemasok</label>
                            <input type="text" class="form-control" id="editNama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="editAlamat">Alamat</label>
                            <input type="text" class="form-control" id="editAlamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="editTelepon">Telepon</label>
                            <input type="text" class="form-control" id="editTelepon" name="telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="editEmail">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
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
        $('#editSupplierModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var nama = button.data('nama');
            var alamat = button.data('alamat');
            var telepon = button.data('telepon');
            var email = button.data('email');

            var modal = $(this);
            modal.find('#editSupplierId').val(id);
            modal.find('#editNama').val(nama);
            modal.find('#editAlamat').val(alamat);
            modal.find('#editTelepon').val(telepon);
            modal.find('#editEmail').val(email);

            // Update the action URL for the form
            $('#editSupplierForm').attr('action', '/pemasok/' + id); // Ganti dengan route edit yang sesuai
        });
    </script>
</div>

</body>
</html>
