<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemasok</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            Navigasi
        </div>
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
    <div class="content">
        <div class="title-container">
            <h4 class="title">DAFTAR PEMASOK</h4>
        </div>
        <div class="header">
            <!-- Notifikasi untuk aksi yang berhasil -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="title-container">
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
