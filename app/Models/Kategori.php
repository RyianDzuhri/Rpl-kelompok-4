<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori', // Nama kategori
        'deskripsi' // Jika Anda ingin menambahkan deskripsi kategori
    ];

    // Menambahkan relasi dengan model Barang
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
