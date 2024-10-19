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
    <link href="{{ asset('css/barang.css') }}" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            Navigasi
        </div>
        <a href="{{ route('barang.dashboard') }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
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
            <h4 class="title">DAFTAR BARANG</h4>
        </div>
        
        <div class="header">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBarangModal">Tambah Barang</button>
                    <form action="{{ route('barang.search') }}" method="GET" class="input-group ml-3" style="width: 250px;">
                        <input type="text" class="form-control custom-input" name="query" placeholder="Cari Nama Barang" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>                                                          
                </div>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Pemasok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($barang->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Barang dengan nama "{{ request()->query('query') }}" tidak ditemukan.</td>
                            </tr>
                        @else
                            @foreach($barang as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 + ($barang->currentPage() - 1) * $barang->perPage() }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->kategori->nama_kategori ?? 'Kategori Tidak Ada' }}</td>
                                    <td>{{ $item->pemasok->nama ?? 'Pemasok Tidak Ada' }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editBarangModal"
                                                data-id="{{ $item->id_barang }}"
                                                data-nama_barang="{{ $item->nama_barang }}"
                                                data-harga="{{ $item->harga }}"
                                                data-stok="{{ $item->stok }}"
                                                data-kategori_id="{{ $item->kategori_id }}"
                                                data-pemasok_id="{{ $item->pemasok_id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- Menampilkan link pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-3">
                        {{-- Tombol Previous --}}
                        <li class="page-item {{ $barang->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $barang->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        {{-- Menampilkan nomor halaman --}}
                        @foreach ($barang->getUrlRange(1, $barang->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $barang->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- Tombol Next --}}
                        <li class="page-item {{ $barang->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $barang->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>           
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
                                <select name="kategori_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pemasok_id">Pemasok:</label>
                                <select name="pemasok_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Pemasok</option>
                                    @foreach ($pemasok as $pem)
                                        <option value="{{ $pem->id }}">{{ $pem->nama }}</option>
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
                                <label for="editKategoriId">Kategori:</label>
                                <select id="editKategoriId" name="kategori_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editPemasokId">Pemasok:</label>
                                <select id="editPemasokId" name="pemasok_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Pemasok</option>
                                    @foreach ($pemasok as $pem)
                                        <option value="{{ $pem->id }}">{{ $pem->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mengisi form edit dengan data yang dipilih
        $('#editBarangModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nama_barang = button.data('nama_barang');
            var harga = button.data('harga');
            var stok = button.data('stok');
            var kategori_id = button.data('kategori_id');
            var pemasok_id = button.data('pemasok_id');

            var modal = $(this);
            modal.find('#editBarangId').val(id);
            modal.find('#editNamaBarang').val(nama_barang);
            modal.find('#editHarga').val(harga);
            modal.find('#editStok').val(stok);
            modal.find('#editKategoriId').val(kategori_id);
            modal.find('#editPemasokId').val(pemasok_id);
            modal.find('form').attr('action', '/barang/' + id); // Ubah URL action untuk form edit
        });
    </script>
</body>
</html>
