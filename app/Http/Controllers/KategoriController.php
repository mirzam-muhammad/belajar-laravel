<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //QUERY UNTUK AMBIL SEMUA DATA.
        $kategori = Kategori::get();
        return view('pages.kategori.show', compact(('kategori')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori'=>'required',
            'deskripsi'=>'required'
        ],[
            'nama_kategori.required'=>'Nama Kategori wajib diiisi',
            'deskripsi.required'=>'Deskripsi kategori wajib diiisi'
        ]);

        Kategori::create([
            'nama_kategori'=>$request->nama_kategori,
            'deskripsi'=>$request->deskripsi
        ]);

        return 
        redirect('/kategori')->with('message', 'Kategori Berhasil Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kategori::findOrFail($id);
        return view('pages.kategori.edit',[
            'kategori'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_kategori'=>'required',
            'deskripsi'=>'required',
        ],[
            'nama_kategori.required'=>'Nama kategori wajib diisi',
            'deskripsi.required'=>'Deskripsi kategori wajib diisi'
        ]);

        //QUERY UNTUK SIMPAN DATA YANG DIUPDATE
        Kategori::where('id_kategori', $id)->update([
            'nama_kategori'=>$request->nama_kategori,
            'deskripsi'=>$request->deskripsi,
        ]);

        return redirect('/kategori')->with('message', 'Data kategori berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         Kategori::findOrFail($id)->delete();
         return redirect('/kategori')->with('message', 'Data kategori berhasil dihapus.');
    }
}
