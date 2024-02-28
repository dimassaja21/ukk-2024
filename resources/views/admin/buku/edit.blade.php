@extends('layouts.app')
@section('title', 'Edit Data Buku')

@section('content')
    <div class="container mt-4 ">
        <div class="row justify-content-center items-center">
            <div class="card w-75">
                <div class="card-header">
                    <h3 class="text-center">Edit Data Buku</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}">
                        </div>
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}">
                        </div>
                        @error('penulis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}">
                        </div>
                        @error('penerbit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="text" name="tahun_terbit" class="form-control"
                                value="{{ $buku->tahun_terbit }}">
                        </div>
                        @error('tahun_terbit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('admin.buku') }}" type="submit" class="btn btn-outline-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
