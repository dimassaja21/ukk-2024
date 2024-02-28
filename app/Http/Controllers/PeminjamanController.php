<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();
        $buku = Buku::all();
        $user = User::all();
        return view('peminjaman.index', compact('peminjaman', 'buku', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::all();
        $user = User::all();
        return view('peminjaman.create', compact('buku', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required',
            // 'buku_id' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'status_peminjaman' => 'required',
        ], [
            'user_id.required' => 'Judul harus diisi',
            'buku_id.required' => 'Judul harus diisi',
            'tanggal_peminjaman.required' => 'Judul harus diisi',
            'tanggal_pengembalian.required' => 'Judul harus diisi',
            'status_peminjaman.required' => 'Judul harus diisi',
        ]);

        $peminjaman = new Peminjaman;
        $peminjaman->user_id = $request->user_id;
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
        $peminjaman->status_peminjaman = $request->status_peminjaman;
        // $peminjaman = Peminjaman::create($request->all());
        $peminjaman->save();

        return redirect()->route('peminjaman')->withSuccess('Data Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
