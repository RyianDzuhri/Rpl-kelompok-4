<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelPemasok extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasok', function (Blueprint $table) {
            $table->id(); // Kunci utama (primary key)
            $table->string('nama'); // Nama pemasok
            $table->string('alamat')->nullable(); // Alamat pemasok
            $table->string('telepon')->nullable(); // Nomor telepon pemasok
            $table->string('email')->unique()->nullable(); // Email pemasok (unik)
            $table->timestamps(); // Tanggal dibuat dan diubah
        });
    }

    /**
     * Kembalikan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasok');
    }
}
