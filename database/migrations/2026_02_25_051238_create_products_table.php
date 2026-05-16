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
        //sintaks untuk membuat tabel produk
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('kode_produk')->unique();
            $table->string('nama_produk', 150);
            $table->bigInteger('harga');
            $table->text('deskripsi_produk');
            $table->integer('stok');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id_kategori')->on('tb_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
