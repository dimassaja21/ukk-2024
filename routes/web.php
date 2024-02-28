<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');

Route::middleware(['auth', 'cekrole:admin,petugas,peminjam'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});

Route::middleware(['auth', 'cekrole:admin,petugas'])->group(function () {
    // BUKU
    Route::get('/buku', [BukuController::class, 'index'])->name('admin.buku');

    Route::get('/bukuCreate', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/bukuStore', [BukuController::class, 'store'])->name('buku.store');

    Route::get('/bukuEdit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::post('/bukuUpdate/{id}', [BukuController::class, 'update'])->name('buku.update');

    Route::get('/bukuDelete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::get('/bukuPDF', [BukuController::class, 'bukuPDF'])->name('buku.bukuPDF');

    // KATEGORI BUKU
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');

    Route::get('/kategoriCreate', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategoriStore', [KategoriController::class, 'store'])->name('kategori.store');

    Route::get('/kategoriEdit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategoriUpdate/{id}', [KategoriController::class, 'update'])->name('kategori.update');

    Route::get('/kategoriDelete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware(['auth', 'cekrole:admin,petugas,peminjam'])->group(function () {
    // Peminjaman BUKU
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');

    Route::get('/peminjamanCreate', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjamanStore', [PeminjamanController::class, 'store'])->name('peminjaman.store');

    Route::get('/peminjamanEdit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::post('/peminjamanUpdate/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');

    Route::get('/peminjamanDelete/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
});
