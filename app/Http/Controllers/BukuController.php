<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Kategori;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            // 'kategori_id' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            // 'sampul' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'penerbit.required' => 'Penerbit harus diisi',
            'tahun_terbit.required' => 'Tahun Terbit harus diisi',
        ]);

        // $buku = new Buku;
        // $buku->judul = $request->judul;
        // // $buku->kategori_id = $request->kategori_id;
        // $buku->penulis = $request->penulis;
        // $buku->penerbit = $request->penerbit;
        // $buku->tahun_terbit = $request->tahun_terbit;
        $buku = Buku::create($request->all());
        // if ($request->hasFile('sampul')) {
        //     $buku->sampul = $request->file('sampul')->getClientOriginalName();
        //     $request->file('sampul')->move('images/', $request->file('sampul')->getClientOriginalName());
        //     $buku->save();
        // }
        $buku->save();
        return redirect()->route('admin.buku')->withSuccess('Buku Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku, $id)
    {
        $buku = Buku::find($id);
        return view('admin.buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->update($request->all());
        $buku->update();
        return redirect()->route('admin.buku')->withSuccess('Data Berhasil Diedit!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('admin.buku')->withSuccess('Data Berhasil Dihapus!!');
    }

    public function bukuPDF()
    {
        $buku = Buku::all();
        $bukuPDF = Pdf::loadview('pdf.buku-pdf', ['buku' => $buku]);
        return $bukuPDF->download('export-buku-pdf');
    }
}
