<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'pemasok'; // Nama tabel di database
    protected $fillable = [
        'nama',      // Nama pemasok
        'alamat',    // Alamat pemasok
        'telepon',   // Nomor telepon pemasok
        'email',     // Email pemasok
    ];
}
