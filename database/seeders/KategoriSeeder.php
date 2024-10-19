<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori; // Pastikan model Kategori di-import

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::insert([
            ['nama_kategori' => 'Casing HP', 'deskripsi' => 'Pelindung untuk smartphone yang dirancang untuk melindungi dari goresan, benturan, dan kotoran.'],
            ['nama_kategori' => 'Pelindung Layar', 'deskripsi' => 'Aksesoris yang digunakan untuk melindungi layar smartphone dari goresan, pecah, dan noda.'],
            ['nama_kategori' => 'Charger dan Kabel Data', 'deskripsi' => 'Perangkat pengisi daya dan kabel untuk menghubungkan smartphone ke sumber daya.'],
            ['nama_kategori' => 'Headphone', 'deskripsi' => 'Perangkat audio yang digunakan untuk mendengarkan musik atau melakukan panggilan.'],
            ['nama_kategori' => 'Power Bank', 'deskripsi' => 'Perangkat portabel yang digunakan untuk mengisi daya smartphone saat tidak ada sumber daya.'],
            ['nama_kategori' => 'Speaker Bluetooth', 'deskripsi' => 'Speaker nirkabel yang terhubung melalui Bluetooth untuk memutar musik dari perangkat lain.'],
        ]);
    }
}
