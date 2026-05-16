<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\product; //WAJIB JIKA MENGGUNAKAN ELOQUENT ORM
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request){
        $toko = [
            'nama_toko'=>'New Kharisma',
            'alamat'=>'Benteng',
            'type'=>'Toko'
        ];


        // UNTUK SEARCH DATA
        $search = $request->keyword;

        //ELOQUENT ORM. UNTUK AMBIL DATA DARI DB. DAN DIKIRIMKAN KE VIEW UTK DITAMPILKAN
        $produk=product::when($search,function($query,$search){
            return $query->where('nama_produk','like',"%{$search}%")
            ->orWhere('deskripsi_produk','like',"%{$search}%");
        })
        ->join('tb_kategori','tb_produk.kategori_id','=','tb_kategori.id_kategori')
        ->get(); 
        //query untk ambil semua data dr data tb_produk

        // $queryBuilder=DB::table('tb_produk')->get(); //query utk ambil semua data dr data tb_produk

        return view('pages.produk.show', [
            'data_toko'=>$toko,
            'data_produk'=>$produk
        ]);
    }


    public function create(){
        $data_kategori = Kategori::get();
        return view('pages.produk.add', [
            'data'=>$data_kategori
        ]);
    }

    public function store(Request $request){
        //VALIDASI dulu name inputan dari ADD.BLADE
        $request->validate([
            'nama_produk'=>'required|min:3|max:30',
            'harga_produk'=>'required',
            'deskripsi'=>'required',
            'stok'=>'required',
            'kategori'=>'required',
            'gambar'=>'required|image|mimes:jpg,png,jpeg|max:1000'
        ],[
            'nama_produk.min'=>'Nama produk minimal 3 huruf',
            'nama_produk.max'=>'Nama produk maksimal 30 huruf',
            'nama_produk.required'=>'Nama produk wajib diisi',
            'harga_produk.required'=>'Harga produk wajib diisi',
            'deskripsi.required'=>'Deskripsi produk wajib diisi',
            'stok.required'=>'Stok wajib diisi',
            'kategori.required'=>'Kategori wajib dipilih',
            'gambar.required'=>'Gambar harus diunggah',
            'gambar.mimes'=>'Format gambar hanya jpg, jpeg, dan png',
            'gambar.max'=>'Ukuran gambar tidak boleh melebihi 1 MB'
        ]);

        $namaFile = Str::random(5).'.'.$request->gambar->extension();
        $request->gambar->move(public_path('gambar_produk'),$namaFile);


        //QUERY MENAMBAH DATA KE TABEL PRODUK. ARAHNYA KE MODEL product YA
        //SINTAX INI MENGGUNAKAN ORM ELLOQUENT
        product::create([
            'kode_produk'=>Str::random(5),
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi,
            'kategori_id'=>$request->kategori,
            'stok'=>$request->stok,
            'gambar'=>$namaFile
        ]);

        //SETELAH BERHASIL TAMBAH DATA, DIARAHKAN KEMBALI KE LAMAN PRODUK DAN NOTIFIKASI
        return 
        redirect('/produk')->with('message', 'Berhasil menambah data');
        
    }


    public function show($id){
    //QUERY UNTUK MENAMPILKAN DATA DARI ID
    //EQLOQUENT ORM
    $data = product::findOrFail($id);
    return view('pages.produk.detail', [
        'produk'=>$data
    ]);
    }


    public function edit($id){
    //MENGAMBIL SATU DATA DARI PARAMETER ID YANG DIKIRIMKAN
    $data = product::findOrFail($id);
    $data_kategori = Kategori::get();
    return view('pages.produk.edit', [
        'produk'=>$data,
        'kategori'=>$data_kategori
    ]);
    }

    public function update($id, Request $request){
         //VALIDASI
        $request->validate([
            'nama_produk'=>'required',
            'harga_produk'=>'required',
            'deskripsi'=>'required',
            'stok'=>'required',
            'kategori'=>'required',
            'gambar'=>'image|mimes:jpg,png,jpeg|max:1000'
        ],[
            'nama_produk.required'=>'Nama produk wajib diisi',
            'harga_produk.required'=>'Harga produk wajib diisi',
            'deskripsi.required'=>'Deskripsi produk wajib diisi',
            'stok.required'=>'Stok wajib diisi',
            'kategori.required'=>'Kategori wajib dipilih',
            'gambar.mimes'=>'Format gambar hanya jpg, jpeg, dan png',
            'gambar.max'=>'Ukuran gambar tidak boleh melebihi 1 MB'
        ]);

        if($request->hasFile('gambar')){
            $namaFile = Str::random(5).'.'.$request->gambar->extension();
            $request->gambar->move(public_path('gambar_produk'),$namaFile);
        }else{
            $data_lama = product::findOrFail($id);
            $namaFile = $data_lama->gambar;
        }

        //QUERY UNTUK SIMPAN DATA YANG DIUPDATE
        product::where('id_produk', $id)->update([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi,
            'stok'=>$request->stok,
            'kategori_id'=>$request->kategori,
            'gambar'=>$namaFile
        ]);

        return redirect('/produk')->with('message', 'Data berhasil diubah.');   
    }

    
    public function destroy($id){
        //QUERY UNTUK MENGHAPUS DATA DI DATABASE
        product::findOrFail($id)->delete();
         return redirect('/produk')->with('message', 'Data berhasil dihapus.');
    }

}
