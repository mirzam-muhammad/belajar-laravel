<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         DB::table('tb_kategori')->insert([
            [
                'nama_kategori'=>'ATK',
                'deskripsi'=>'Persediaan berjenis ATK'
            ],
            [
                'nama_kategori'=>'Elektronik',
                'deskripsi'=>'Persediaan berjenis Elektronik'
            ]
        ]);

        DB::table('tb_produk')->insert([
        [
            'kode_produk'=>'A001',
            'nama_produk'=>'Buku',
            'harga'=>150000,
            'deskripsi_produk'=>'Ini adalah deskripsi Buku',
            'stok'=>10,
            'kategori_id'=>1,
            'created_at'=>now()
        ],
        [
            'kode_produk'=>'A002',
            'nama_produk'=>'Pulpen',
            'harga'=>50000,
            'deskripsi_produk'=>'Ini adalah deskripsi pulpen',
            'stok'=>10,
            'kategori_id'=>1,
            'created_at'=>now()
        ],
        [
            'kode_produk'=>'B001',
            'nama_produk'=>'Flashdisk',
            'harga'=>100000,
            'deskripsi_produk'=>'Ini adalah deskripsi flashdisk',
            'stok'=>10,
            'kategori_id'=>2,
            'created_at'=>now()
        ]
        ]);
    }
}
