@extends('layouts.master')

@section('title', 'Ubah Data Barang Persediaan')

@section('konten')

<div class="card">
    <div class="card-body">
        <form action="/produk/{{$produk->id_produk}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">

                <div class="col-sm-6">
                     @if ($produk->gambar == null)
                    <p>Gambar Belum Diunggah</p>
                    @else
                    <img src="{{ asset('gambar_produk/'.$produk->gambar) }}" class="img-fluid" width="400" alt="">
                    @endif

                    <div class="mb-3">
                    <label class="form-label">Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control" value="{{old('gambar')}}">
                    <div id="emailHelp" class="form-text text-muted">Unggah bagian ini jika ingin mengganti gambar</div>
                    @error('gambar')
                    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                    @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Nama Barang Persediaan</label>
                <input type="text" name="nama_produk" class="form-control" value="{{$produk->nama_produk}}">
                @error('nama_produk')
                    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
                </div>
                </div>

                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga_produk" class="form-control" value="{{$produk->harga}}">
                @error('harga_produk')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>
                
                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="text" name="stok" class="form-control" value="{{$produk->stok}}">
                @error('stok')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>

                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Kategori Persediaan</label>
                <select class="custom-select" aria-label="Default select example" name="kategori">
                    
                    @foreach ($kategori as $item )
                    @if ($item->id_kategori == $produk->kategori_id)
                    <option value="{{ $item->id_kategori }}" selected>{{ $item->nama_kategori }}</option>
                    @else
                    <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                    @endif     
                    @endforeach
                </select>

                @error('kategori')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>
            
                <div class="col-12">
                    <label for="floatingTextarea2">Deskripsi Barang Persediaan</label>
                <div class="form-floating">
                <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"> {{$produk->deskripsi_produk}}</textarea>
                </div>
                </div>

                <div class="col-sm-12 mt-3">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>

                <div class="col-sm-12 mt-3">
                <a href="/produk/" type="button" class="btn btn-info">Kembali ke Produk</a>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection