@extends('layouts.app')
@section('title', 'Buku')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="mb-3">
                <h1 class="text-center text-black-100">Data Buku</h1>
            </div>
            <div class="d-flex mb-3 justify-content-between">
                <a href="{{ route('buku.create') }}" class="btn btn-primary"><i class="ri-add-line"></i> Tambah Data</a>
                <a href="{{ route('buku.bukuPDF') }}" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i> Export
                    PDF</a>
            </div>
            <table id="bukuTable" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Sampul</th> --}}
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($buku as $bu)
                        <tr>
                            <th>{{ $no++ }}</th>
                            {{-- <td>
                                <img src="{{ asset('assets/images/' . $bu->sampul) }}" width="150" alt="">
                            </td> --}}
                            <td>{{ $bu->judul }}</td>
                            <td>{{ $bu->kategori->name }}</td>
                            <td>{{ $bu->penulis }}</td>
                            <td>{{ $bu->penerbit }}</td>
                            <td>{{ $bu->tahun_terbit }}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="{{ route('buku.edit', $bu->id) }}" class="btn btn-warning"><i
                                            class="fa-regular fa-pen-to-square "></i></a>
                                    <a href="{{ route('buku.destroy', $bu->id) }}" class="btn btn-danger"><i
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
            $('#bukuTable').DataTable();
        });
    </script>
@endsection
