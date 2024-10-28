# Dokumentasi Proyek

## Deskripsi Proyek
Proyek ini adalah aplikasi manajemen inventaris sederhana yang memungkinkan pengguna untuk mengelola barang, kategori, dan pemasok dengan efisien.

## Fitur
- Menampilkan daftar barang
- Menambah, mengedit, dan menghapus barang
- Menampilkan kategori barang
- Menampilkan pemasok barang
- Pencarian barang berdasarkan ID
- Pagination untuk daftar barang
- Modal untuk menampilkan dan mengedit informasi barang

## Teknologi yang Digunakan
- **PHP**: Versi 8.2 ke atas
- **Laravel**: Versi terbaru (11)
- **Bootstrap**: Untuk desain UI
- **MySQL**: Sebagai database

## Instalasi
1. Clone repositori ini
```bash
git clone <URL_REPOSITORI>
```

2. Masuk ke direktori proyek:
```bash
cd <NAMA_DIREKTORI>
```

3. Install dependensi menggunakan Composer
```bash
composer install
```

4. Buat file .env dari file .env.example
```bash
cp .env.example .env
```

5. Atur konfigurasi database di file .env

6. Atur Key dalam file env
```bash
php artisan key:generate
```

7. Jalankan migrasi untuk menyiapkan database
```bash
php artisan migrate
```

8. Jalankan Seeder Secara Terpisah
```bash
php artisan db:seed --class=KategoriSeeder
```

9. Jalankan server di localhost
```bash
php artisan serve
```
