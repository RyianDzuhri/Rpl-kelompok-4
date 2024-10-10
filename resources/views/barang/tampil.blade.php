<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Gaya Sidebar */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #0c0a33;
            padding-top: 20px;
        }
        .sidebar-header {
            padding: 15px 20px;
            background-color: #1e2649;
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
        .sidebar a.active {
            background-color: #0054c2; /* Warna latar belakang saat aktif */
            color: black; /* Warna teks saat aktif */
        }

        /* Gaya Umum */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('images/bgkat.jpg') }}');
            background-size: cover;
            background-position: center;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .title-container {
            background-color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .title {
            font-size: 2em;
            color: #000000;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            Navigasi
        </div>
        <a href="{{ route('barang.tampil') }}" class="{{ request()->routeIs('barang.tampil') ? 'active' : '' }}">
            <i class="fas fa-box"></i> Inventaris Barang
        </a>
        <a href="{{ route('barang.pemasok') }}" class="{{ request()->routeIs('barang.pemasok') ? 'active' : '' }}">
            <i class="fas fa-truck"></i> Daftar Pemasok
        </a>
        <a href="{{ route('barang.kategori') }}" class="{{ request()->routeIs('barang.kategori') ? 'active' : '' }}">
            <i class="fas fa-tags"></i> Daftar Kategori
        </a>
    </div>

    <div class="content">
        <div class="title-container">
            <h4 class="title">DAFTAR BARANG</h4>            
        </div>
        
        <div class="header">
            <!-- Notifikasi untuk aksi yang berhasil -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="title-container">
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBarangModal">Tambah Barang</button>
                    <form action="{{ route('barang.search') }}" method="GET" class="input-group ml-3" style="width: 250px;">
                        <input type="text" class="form-control" name="query" placeholder="Cari ID" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>

                <!-- Tabel Daftar Barang -->
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>ID Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($barang->isEmpty())
                            <tr>
                                <td colspan="6">Tidak ada barang ditemukan dengan ID tersebut.</td>
                            </tr>
                        @else
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
                        @endif
                    </tbody>                    
                </table>  
            </div> 
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
                                <label for="kategori_id">Kategori:</label>
                                <select name="kategori_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($kategori as $kat) <!-- Mengambil data kategori -->
                                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option> <!-- Menampilkan nama kategori -->
                                    @endforeach
                                </select>
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
                                <label for="kategori_id">Kategori:</label>
                                <select name="kategori_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($kategori as $kat) <!-- Mengambil data kategori -->
                                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option> <!-- Menampilkan nama kategori -->
                                    @endforeach
                                </select>
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

                var modal = $(this);
                modal.find('#editBarangId').val(id);
                modal.find('#editNamaBarang').val(nama_barang);
                modal.find('#editHarga').val(harga);
                modal.find('#editStok').val(stok);

                $('#editBarangForm').attr('action', '/barang/' + id);
            });
        </script>
        </div>
    </div>
</body>
</html>
