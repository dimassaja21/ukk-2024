@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container mt-3">
        <h1 class="text-center">Selamat datang di website BacaBook, {{ Auth::user()->name }}!!</h1>
    </div>

    {{-- <div class="container mt-4">
        <div class="row">
            <div class="card w-25">
                <img src="{{ asset('assets/images/joker.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
