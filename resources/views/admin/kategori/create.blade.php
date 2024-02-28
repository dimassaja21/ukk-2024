@extends('layouts.app')
@section('title', 'Tambah Data Kategori')

@section('content')
    <div class="container mt-4 ">
        <div class="row justify-content-center items-center">
            <div class="card w-75">
                <div class="card-header">
                    <h3 class="text-center">Tambah Data Kategori</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Masukkan Nama Kategori...">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('admin.kategori') }}" type="submit"
                                class="btn btn-outline-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
