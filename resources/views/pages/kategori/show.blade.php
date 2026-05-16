@extends('layouts.master')

@section('title', 'Daftar Kategori Persediaan')

@section('konten')
<hr>
<a href="/kategori/create" type="button" class="btn btn-primary mb-3">TAMBAH KATEGORI</a>


@if (session('message'))
  <div class="alert alert-primary">{{session('message')}}</div>
@endif


<div class="card">
    <div class="card-header">
        Tabel Kategori
    </div>

    <div class="card-body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Deskripsi Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
    @forelse ($kategori as $item )
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $item->nama_kategori }}</td>
      <td>{{ $item->deskripsi }}</td>
      <td>
        <a href="/kategori/{{ $item->id_kategori }}/edit" class="btn btn-warning">Ubah</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{$item->id_kategori}}">Hapus</button>
    </tr>

    @empty
        <tr>
            <td colspan="4">Data Kategori tidak Tersedia</td>
        </tr>
    @endforelse
  </tbody>
</table>
    </div>
</div>

{{-- Modal Hapus --}}
{{-- @foreach ($kategori as $item)
  <div class="modal fade" id="hapus{{$item->id_kategori}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/kategori/{{ $item->id_kategori }}" method="POST" class="modal-content">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin menghapus data {{$item->nama_kategori}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </form>
  </div>
</div>
@endforeach --}}

@foreach ($kategori as $item)
<div class="modal fade" id="hapus{{$item->id_kategori}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form action="/kategori/{{ $item->id_kategori }}" method="POST" class="modal-content">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data Kategori</h5>
        {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        Apakah Anda yakin menghapus data {{$item->nama_kategori}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

@endsection