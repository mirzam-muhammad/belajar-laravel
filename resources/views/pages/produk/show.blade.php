@extends('layouts.master')

@section('title', 'Daftar Barang Persediaan')

@section('konten')

<a href="/produk/create" type="button" class="btn btn-primary mb-3">TAMBAH DATA</a>

  <div class="alert alert-primary">
    <b>Nama Toko:</b> {{ $data_toko['nama_toko'] }} <br>
    <b>Alamat Toko:</b>{{ $data_toko['alamat'] }} <br>
    <b>Jenis Toko:</b> {{ $data_toko['type'] }}<br>
  </div>

{{-- Alert Berhasil CRUD--}}
@if (session('message'))
  <div class="alert alert-primary">{{session('message')}}</div>
@endif


<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      CARI BARANG PERSEDIAAN
      <div class="d-flex gap-2">
        @if (Request()->keyword != '')
          <a href="/produk" class="btn btn-info">Reset</a>
        @endif
        
        <form class="input-group" style="width: 400px">
        <input type="text" class="form-control" name="keyword" placeholder="Cari Data Barang Persediaan">
        <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
        </form>

      </div>
    </div>


  <div class="card-body">
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Produk</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

   @forelse ($data_produk as $item )
      <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      {{-- <td>{{ $item->kode_produk }}</td> --}}
      <td>{!! DNS1D::getBarcodeHTML($item->kode_produk, 'C39') !!}</td>
      {{-- <td>{!! DNS2D::getBarcodeHTML($item->kode_produk, 'QRCODE', 4, 4) !!}</td> --}}
      <td>{{ $item->nama_produk }}</td>
      <td>{{ $item->harga }}</td>
      <td>{{ $item->stok }}</td>
      <td>{{ $item->nama_kategori }}</td>
      <td>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{$item->id_produk}}">Hapus</button>
        <a href="/produk/{{$item->id_produk}}/edit" class="btn btn-warning">Ubah</a>
        <a href="/produk/{{$item->id_produk}}" type="button" class="btn btn-info">Detail</a></td>
    </tr>
     
    {{-- Search jika tidak ada --}}
   @empty
     <tr>
      <td colspan="5">Data yang Anda cari tidak tersedia</td>
     </tr>
   @endforelse
    
  </tbody>
</table>
  </div>
</div>


{{-- MODAL UNTUK HAPUS BOOTSRAP 5--}}
{{-- @foreach ($data_produk as $item)
  <div class="modal fade" id="hapus{{$item->id_produk}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/produk/{{ $item->id_produk }}" method="POST" class="modal-content">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin menghapus data {{$item->nama_produk}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </form>
  </div>
</div>
@endforeach --}}

<!-- Modal -->
@foreach ($data_produk as $item)
<div class="modal fade" id="hapus{{$item->id_produk}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form action="/produk/{{ $item->id_produk }}" method="POST" class="modal-content">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
        {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        Apakah Anda yakin menghapus data {{$item->nama_produk}}?
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