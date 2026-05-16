@extends('layouts.master')

@section('title', 'Tambah Kategori Persediaan')

@section('konten')
    <div class="card-body">

        <form action="/kategori" method="POST">
            @csrf
             <div class="row">

                {{-- name untuk identifikasi row tabel --}}
                <div class="col-sm-6">
                <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{old('nama_kategori')}}">
                @error('nama_kategori')
                    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
                </div>
                </div>
            
                <div class="col-12">
                <div class="form-floating">
                <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Deskripsi</label>
                </div>
                </div>


                <div class="col-sm-12 mt-3">
                <button type="submit" class="btn btn-primary">Tambah Data Kategori</button>
                </div>

                <div class="col-sm-12 mt-3">
                <a href="/kategori/" type="button" class="btn btn-info">Kembali ke Kategori</a>
                </div>

            </div>
        </form>

    </div>

@endsection