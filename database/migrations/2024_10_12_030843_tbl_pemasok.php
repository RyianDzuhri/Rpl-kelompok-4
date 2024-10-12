<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     *
     */
    public function up(): void
    {
        Schema::create('pemasok', function (Blueprint $table) {
            $table->id(); // Kunci utama (primary key)
            $table->string('nama'); // Nama pemasok
            $table->string('alamat')->nullable(); // Alamat pemasok (nullable)
            $table->string('telepon')->nullable(); // Nomor telepon pemasok (nullable)
            $table->string('email')->unique()->nullable(); // Email pemasok (unik dan nullable)
            $table->timestamps(); // Tanggal dibuat dan diubah
        });
    }


    /**
     * Kembalikan migrasi.
     *
     */
    public function down()
    {
        Schema::dropIfExists('pemasok');
    }
};
