@extends('layouts.app')
@section('title', 'Kategori Buku')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="mb-3">
                <h1 class="text-center text-black-100">Data Kategori Buku</h1>
            </div>
            <div class="d-flex mb-3 justify-content-between">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary"><i class="ri-add-line"></i> Tambah Data</a>
            </div>
            <table id="kategoriTable" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($kategori as $cat)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $cat->name }}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="{{ route('kategori.edit', $cat->id) }}" class="btn btn-warning"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ route('kategori.destroy', $cat->id) }}" class="btn btn-danger"><i
                                            class="fa-regular fa-trash-can"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#kategoriTable').DataTable();
        });
    </script>
@endsection
