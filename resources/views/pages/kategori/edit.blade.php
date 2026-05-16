@extends('layouts.master')

@section('title', 'Ubah Kategori Persediaan')

@section('konten')

<div class="card">
    <div class="card-body">
        <form action="/kategori/{{$kategori->id_kategori}}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">

                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{$kategori->nama_kategori}}">

                @error('nama_kategori')
                    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
                </div>
                </div>
            
                <div class="col-12">
                <div class="form-floating">
                <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"> {{$kategori->deskripsi}}</textarea>
                <label for="floatingTextarea2">Deskripsi</label>
                </div>
                </div>

                <div class="col-sm-12 mt-3">
                <button type="submit" class="btn btn-primary">Ubah Data Kategori</button>
                </div>

                <div class="col-sm-12 mt-3">
                <a href="/kategori/" type="button" class="btn btn-info">Kembali ke Kategori</a>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection