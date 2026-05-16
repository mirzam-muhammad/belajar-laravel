@extends('layouts.master')

@section('title', 'Tambah Barang Persediaan')

@section('konten')

<div class="card">
    <div class="card-body">

        {{-- Action /Produk ini untuk mengirimkan ke Produk dgn Metod POST 
        Kalau csrf ini token blade di laravel. Kalau tidak ada, akan ditolak laravel--}}
        <form action="/produk" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                {{-- name untuk identifikasi row tabel --}}
                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Gambar Produk</label>
                <input type="file" name="gambar" class="form-control" value="{{old('gambar')}}">
                @error('gambar')
                    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
                </div>
                </div>

                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" value="{{old('nama_produk')}}">
                @error('nama_produk')
                    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
                </div>
                </div>

                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga_produk" class="form-control" value="{{old('harga_produk')}}">
                @error('harga_produk')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>
                
                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="text" name="stok" class="form-control" value="{{old('stok')}}">
                @error('stok')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>

                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="custom-select" aria-label="Default select example" name="kategori">
                    <option selected>Pilih Kategori Persediaan</option>
                    @foreach ($data as $item )
                        <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>
            
                <div class="col-12">
                    <label for="floatingTextarea2">Deskripsi</label>
                    <div class="form-floating">
                    <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                </div>

                <div class="col-sm-12 mt-3">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>

                <div class="col-sm-12 mt-3">
                <a href="/produk/" type="button" class="btn btn-info">Kembali ke Produk</a>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection