@extends('layouts.app')
@section('title', 'Peminjaman')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="mb-3">
                <h1 class="text-center text-black-100">Data Peminjaman</h1>
            </div>
            <div class="d-flex mb-3 justify-content-between">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary"><i class="ri-add-line"></i> Tambah Data</a>
            </div>
            <table id="peminjamanTable" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($peminjaman as $pinjam)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $pinjam->user->name }}</td>
                            <td>{{ $pinjam->buku->judul }}</td>
                            <td>{{ $pinjam->tanggal_peminjaman }}</td>
                            <td>{{ $pinjam->tanggal_pengembalian }}</td>
                            <td>{{ $pinjam->status_peminjaman }}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="btn btn-warning"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ route('peminjaman.destroy', $pinjam->id) }}" class="btn btn-danger"><i
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
            $('#peminjamanTable').DataTable();
        });
    </script>
@endsection
