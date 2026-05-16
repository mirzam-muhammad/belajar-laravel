@extends('layouts.master')

@section('title', 'Detail Barang Persediaan')

@section('konten')

<div class="card">

  <div class="card-body">
    @if ($produk->gambar == null)
      <p>Gambar Belum Diunggah</p>
    @else
      <img src="{{ asset('gambar_produk/'.$produk->gambar) }}" class="img-fluid" width="400" alt="">
    @endif

    <p>Nama Produk : {{ $produk->nama_produk }}</p>
    <p>Harga Produk : {{ $produk->harga }}</p>
    <p>Deskripsi Produk : {{ $produk->deskripsi_produk }}</p>
    <p>Kategori Produk : ATK</p>
    <p>Stok Produk : Tersedia</p>
    <a href="/produk/" type="button" class="btn btn-info">Kembali ke Produk</a>
  </div>
  
</div>

@endsection