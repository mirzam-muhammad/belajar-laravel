<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/beranda');
});

Route::get('/about', function() {
    return view('pages/about');
});

Route::view('/contact','pages.contact');
//ROUTE GET UNTUK ROUTING YANG SEKALIAN MENGOLAH MENERIMA PARAMETER GET, ADA LOGIKA
//KALAU ROUTE VIEW ITU DIRECT KE WEB STATIS, GA ADA LOGIKA, GA ADA ALUR DATA DAN PARAMETER



//SATU CONTROLLER UTK BANYAK METHOD CRUD PRODUK
Route::get('/produk', [ProductController::class, 'index']); //menampilkan semua data produk

Route::get('/produk/create', [ProductController::class, 'create']); //menampilkan halaman form data
Route::post('/produk', [ProductController::class, 'store']); //utk mengelola data yg dikirim dr form

Route::get('/produk/{id}', [ProductController::class,'show']); //Untuk menampilkan detail produk

Route::get('/produk/{id}/edit', [ProductController::class, 'edit']); //Untuk mengubah satu produk
Route::put('/produk/{id}', [ProductController::class,'update']); //Untuk mengupdate yang baru saja di edit

Route::delete('/produk/{id}', [ProductController::class, 'destroy']); //Method untuk menghapus data


//ROUTE DENGAN RESOURCE.
Route::resource('kategori', KategoriController::class);

