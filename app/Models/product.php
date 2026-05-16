<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //menginisialisasi/mendaftarkan tabel dalam db
    protected $table = 'tb_produk';

    //menginisialisasi kolom yg akan jadi primary key
    protected $primaryKey = 'id_produk';

    //pengaturan mengolah tabel, kolom yg bisa diisi
    // protected $fillable = ['nama_produk', 'harga', 'stok'];

    //lawan dari fillable, guarded kolom yg tidak boleh diisi
    protected $guarded = ['id_produk'];
}
