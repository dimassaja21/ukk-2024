<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Nama Kategori harus diisi',
        ]);

        $kategori = new Kategori;
        $kategori->name = $request->name;
        $kategori->save();
        return redirect()->route('admin.kategori')->withSuccess('Buku Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori, $id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->update($request->all());
        $kategori->update();
        return redirect()->route('admin.kategori')->withSuccess('Data Berhasil Diedit!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('admin.kategori')->withSuccess('Data Berhasil Dihapus!!');
    }
}
