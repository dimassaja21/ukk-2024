@extends('layouts.app')
@section('title', 'Tambah Data Buku')

@section('content')
    <div class="container mt-4 ">
        <div class="row justify-content-center items-center">
            <div class="card w-75">
                <div class="card-header">
                    <h3 class="text-center">Tambah Data Buku</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST">
                        @csrf

                        {{-- <div class="mb-3">
                            <label class="form-label">Pilih Foto</label>
                            <input class="form-control" type="file" name="sampul">
                        </div> --}}

                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Buku...">
                        </div>
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id">
                                <option selected>
                                    <blockquote>Pilih Salah Satu</blockquote>
                                </option>
                                @foreach ($kategori as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('kategori_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis...">
                        </div>
                        @error('penulis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit...">
                        </div>
                        @error('penerbit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="text" name="tahun_terbit" class="form-control"
                                placeholder="Masukkan Tahun Terbit...">
                        </div>
                        @error('tahun_terbit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('admin.buku') }}" type="submit" class="btn btn-outline-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
