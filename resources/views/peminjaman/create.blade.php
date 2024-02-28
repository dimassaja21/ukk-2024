@extends('layouts.app')
@section('title', 'Tambah Data Peminjaman')

@section('content')
    <div class="container mt-4 ">
        <div class="row justify-content-center items-center">
            <div class="card w-75">
                <div class="card-header">
                    <h3 class="text-center">Tambah Data Peminjaman</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Peminjam</label>
                            <select class="form-select" name="user_id">
                                <option selected>
                                    <blockquote>Pilih Salah Satu</blockquote>
                                </option>
                                @foreach ($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Judul Buku</label>
                            <select class="form-select" name="buku_id">
                                <option selected>
                                    <blockquote>Pilih Salah Satu</blockquote>
                                </option>
                                @foreach ($buku as $buk)
                                    <option value="{{ $buk->id }}">{{ $buk->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('buku_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_peminjaman" class="form-control"
                                placeholder="Masukkan Tanggal Peminjaman...">
                        </div>
                        @error('tanggal_peminjaman')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" class="form-control"
                                placeholder="Masukkan Tanggal Pengembalian...">
                        </div>
                        @error('tanggal_pengembalian')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Status Peminjaman</label>
                            <select class="form-select" name="status_peminjaman">
                                <option value="Dipinjam" selected>Dipinjam</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                        @error('status_peminjaman')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('peminjaman') }}" type="submit" class="btn btn-outline-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
