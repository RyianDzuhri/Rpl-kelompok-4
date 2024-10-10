<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang'; // Ganti dengan nama kolom yang sesuai
    public $incrementing = true;
    protected $fillable = [
        'nama_barang',
        'harga',
        'stok',
        'kategori_id',
    ];
}
