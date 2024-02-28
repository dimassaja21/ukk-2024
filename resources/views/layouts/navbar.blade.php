<nav class="navbar shadow-sm navbar-expand-lg" style="background: #ced4da">
    <div class="container">
        <a class="navbar-brand text-danger fw-bold font-monospace" href="{{ route('home') }}">eLibrarium</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.buku') }}">Buku</a>
                </li>
            </ul>
            <div class="d-flex justify-content-end">
                <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger"><i class="ri-logout-box-r-line"></i>
                    Logout</a>
            </div>
        </div> --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                @if ((auth()->user()->role == 'admin') == 'petugas')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.buku') }}">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.kategori') }}">Kategori</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('peminjaman') }}">Peminjaman</a>
                </li>
            </ul>
            <div class="d-flex justify-content-end">
                <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>
        {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
    </div>
</nav>
