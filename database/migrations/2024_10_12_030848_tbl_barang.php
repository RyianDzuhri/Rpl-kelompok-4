<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang'); // Kolom id_barang sebagai primary key
            $table->string('nama_barang'); // Kolom untuk nama barang
            $table->decimal('harga', 10, 2); // Kolom untuk harga barang dengan 2 digit desimal
            $table->unsignedInteger('stok')->default(0); // Kuantitas stok

            // Menambahkan kolom kategori_id untuk foreign key dari tabel kategori
            $table->unsignedBigInteger('kategori_id'); 
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade'); // Menambahkan foreign key

            // Menambahkan kolom pemasok_id untuk foreign key dari tabel pemasok
            $table->unsignedBigInteger('pemasok_id')->nullable(); // Nullable jika tidak ada pemasok
            $table->foreign('pemasok_id')->references('id')->on('pemasok')->onDelete('cascade'); // Menambahkan foreign key

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
