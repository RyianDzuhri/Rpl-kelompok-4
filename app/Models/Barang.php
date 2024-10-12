<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang'; // Ganti dengan nama kolom yang sesuai
    public $incrementing = true; // Jika ID adalah integer dan auto-increment
    protected $fillable = [
        'nama_barang', // Pastikan ini sesuai dengan nama kolom di database
        'harga',
        'stok',
        'kategori_id',
        'pemasok_id'
    ];

    // Menambahkan relasi dengan model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }
}
