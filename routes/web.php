<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SublyController;

Route::get('/', [SublyController::class, 'index']);
Route::get('/tabel', [SublyController::class, 'index']); 

// Memproses fitur pencarian katalog aplikasi secara dinamis
Route::get('/cari', [SublyController::class, 'cari']);


// Menampilkan halaman detail produk/layanan beserta pilihan paket harganya
Route::get('/detailLayanan/{id}', [SublyController::class, 'detailLayanan']);

// Memproses penyimpanan data form formulir pembelian paket digital ke database
Route::post('/proses-transaksi', [SublyController::class, 'prosesTransaksi']);

// Halaman khusus pengguna yang sudah login untuk memantau Riwayat Transaksi akun
Route::get('/home', [SublyController::class, 'home']);


Route::get('/halaman-login', [SublyController::class, 'awal'])->name('login');
Route::get('/signin', [SublyController::class, 'signin']);
Route::post('/registrasi', [SublyController::class, 'registrasi']);
Route::post('/login', [SublyController::class, 'login']);
Route::get('/logout', [SublyController::class, 'logout']);


Route::get('/tambah', [SublyController::class, 'tambah']);
Route::post('/tambah', [SublyController::class, 'tambah']);
Route::get('/hapus/{id}', [SublyController::class, 'hapus']);

// Menampilkan halaman form edit katalog layanan (update.blade.php)
Route::get('/edit/{id}', [SublyController::class, 'tampilkanFormEdit']);

// Memproses simpan perubahan data katalog layanan ke database
Route::post('/edit', [SublyController::class, 'edit']);
Route::get('/show/{id}', [SublyController::class, 'show']);

// Menampilkan halaman form edit opsi paket harga internal layanan
Route::get('/paket/edit/{id}', [SublyController::class, 'tampilkanFormEditPaket']);

// Memproses simpan pembaruan data paket harga ke database
Route::post('/paket/update', [SublyController::class, 'updatePaket']);

// Menghapus salah satu opsi paket harga tertentu dari database
Route::get('/paket/hapus/{id}', [SublyController::class, 'hapusPaket']);

// Menampilkan form pembuatan paket harga baru berdasarkan ID Layanan induknya
Route::get('/paket/tambah/{id_layanan}', [SublyController::class, 'tampilkanFormTambahPaket']);

// Memproses penyimpanan data paket harga baru ke database
Route::post('/paket/simpan', [SublyController::class, 'simpanPaket']);

Route::get('/transaksi', [SublyController::class, 'halamanTransaksi']);
Route::view('/syarat-ketentuan', 'syarat');
Route::get('/konfirmasi-pembayaran/{id}', [SublyController::class, 'simulasiKonfirmasi']);

// konfirmasi Sukses" dan "Batal" untuk admin 
Route::get('/transaksi/sukses/{id}', [SublyController::class, 'tandaiSukses']);
Route::get('/transaksi/batal/{id}', [SublyController::class, 'tandaiBatal']);