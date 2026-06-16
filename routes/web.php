<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SublyController;

// Rute Publik (Awal masuk web langsung memuat Katalog)
Route::get('/', [SublyController::class, 'index']);
Route::get('/tabel', [SublyController::class, 'index']); 
Route::get('/cari/{nama}', [SublyController::class, 'cari']);
Route::get('/show/{id}', [SublyController::class, 'show']);

// Rute untuk menampilkan halaman Login
Route::get('/halaman-login', [SublyController::class, 'awal'])->name('login');

// Rute Baru untuk Detail Layanan dan Pemesanan Paket
Route::get('/detail/{id}', [SublyController::class, 'detailLayanan']);
Route::post('/proses-transaksi', [SublyController::class, 'prosesTransaksi']);

// Rute Autentikasi
Route::get('/signin', [SublyController::class, 'signin']);
Route::post('/registrasi', [SublyController::class, 'registrasi']);
Route::post('/login', [SublyController::class, 'login']);
Route::get('/logout', [SublyController::class, 'logout']);

// Rute Khusus Admin
Route::post('/tambah', [SublyController::class, 'tambah']);
Route::get('/hapus/{id}', [SublyController::class, 'hapus']);
Route::post('/edit', [SublyController::class, 'edit']);