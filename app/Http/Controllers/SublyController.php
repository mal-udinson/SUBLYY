<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class SublyController extends Controller
{
    public function awal()
    {
        return view('login');
    }

    public function home()
    {

    if (!session()->has('username')) {
        return redirect('/halaman-login')->with(['error' => 'Silakan login terlebih dahulu!']);
    }

    return view('home');
    }

    public function index()
    {
        $layanan = DB::table('tabel_layanan')->get();
        return view('index', ['layanan' => $layanan]);
    }

    public function cari(Request $request)
    {  
        $nama = $request->input('cari');

        $layanan = DB::table('tabel_layanan')
                    ->where('nama_layanan', 'like', "%".$nama."%")
                    ->get();

        return view('index', ['layanan' => $layanan]);
    }

    public function tambah(Request $request)
        {
            if ($request->isMethod('get')) {
                return view('tambah');
            }

            $ekstensi = $request->file('gambar_logo')->getClientOriginalExtension();
            $namaFile = time() . '_' . str_replace(' ', '', $request->nama_layanan) . '.' . $ekstensi;
            $request->file('gambar_logo')->storeAs('public', $namaFile);

            // ✅ TAMBAHKAN DI SINI
            $namaFileClean = null;
            if ($request->hasFile('gambar_logo_clean')) {
                $ekstensiClean = $request->file('gambar_logo_clean')->getClientOriginalExtension();
                $namaFileClean = time() . '_clean_' . str_replace(' ', '', $request->nama_layanan) . '.' . $ekstensiClean;
                $request->file('gambar_logo_clean')->storeAs('public/logo_clean', $namaFileClean);
                $namaFileClean = 'logo_clean/' . $namaFileClean;
            }
            // ✅ SAMPAI SINI

            DB::table('tabel_layanan')->insert([
                'nama_layanan'      => $request->nama_layanan,
                'kategori'          => $request->kategori,
                'gambar_logo'       => $namaFile,
                'gambar_logo_clean' => $namaFileClean, // ✅ tambah ini
            ]);

            return redirect('/'); 
        }

    public function halamanTransaksi()
    {
        if (!session()->has('username')) {
            return redirect('/halaman-login')->with(['error' => 'Silakan login terlebih dahulu!']);
        }

        // Kueri dasar untuk mengambil data transaksi gabungan
        $query = DB::table('tabel_transaksi')
                    ->join('tabel_paket', 'tabel_transaksi.id_paket', '=', 'tabel_paket.id_paket')
                    ->join('tabel_layanan', 'tabel_paket.id_layanan', '=', 'tabel_layanan.id_layanan')
                    ->select('tabel_transaksi.*', 'tabel_paket.nama_paket', 'tabel_paket.harga', 'tabel_layanan.nama_layanan')
                    ->orderBy('tabel_transaksi.id_transaksi', 'desc');

        // LOGIKA PEMISAHAN ADMIN & USER
        if (session('status') == 'admin') {
            // Jika admin, ambil SEMUA data pesanan orang-orang
            $riwayat = $query->get();
        } else {
            // Jika user biasa, HANYA ambil pesanannya sendiri
            $riwayat = $query->whereRaw('TRIM(tabel_transaksi.username_pembeli) = ?', [trim(session('username'))])->get();
        }

        return view('transaksi', ['proses_transaksi' => $riwayat]);
    }

    // FUNGSI KHUSUS ADMIN: ACC TRANSAKSI
    public function tandaiSukses($id)
    {
        if (session('status') == 'admin') {
            DB::table('tabel_transaksi')->where('id_transaksi', $id)->update(['status_pesanan' => 'Sukses']);
        }
        return redirect('/transaksi');
    }

    // FUNGSI KHUSUS ADMIN: TOLAK TRANSAKSI
    public function tandaiBatal($id)
    {
        if (session('status') == 'admin') {
            DB::table('tabel_transaksi')->where('id_transaksi', $id)->update(['status_pesanan' => 'Batal']);
        }
        return redirect('/transaksi');
    }

    public function hapus($id)
    {
        $layanan = DB::table('tabel_layanan')->where('id_layanan', $id)->first();

        if ($layanan) {
            try {
                if (Storage::exists('public/' . $layanan->gambar_logo)) {
                    Storage::delete('public/' . $layanan->gambar_logo);
                }
            } catch (\Exception $e) {
                
            }
        }

        DB::table('tabel_layanan')->where('id_layanan', $id)->delete();

        // Diubah ke halaman utama katalog agar admin tidak terlempar ke halaman riwayat user biasa
        return redirect('/');
    }

    public function tampilkanFormEdit($id)
    {
        $layanan = DB::table('tabel_layanan')
            ->leftJoin('tabel_paket', 'tabel_layanan.id_layanan', '=', 'tabel_paket.id_layanan')
            ->where('tabel_layanan.id_layanan', $id)
            ->select('tabel_layanan.*', 'tabel_paket.harga')
            ->get(); 

        return view('update', compact('layanan'));
    }

    public function show($id)
    {
        $layanan = DB::table('tabel_layanan')
            ->leftJoin('tabel_paket', 'tabel_layanan.id_layanan', '=', 'tabel_paket.id_layanan')
            ->where('tabel_layanan.id_layanan', $id)
            ->select('tabel_layanan.*', 'tabel_paket.harga')
            ->get();

        return view('update', compact('layanan'));
    }

    public function edit(Request $request)
    {
        $dataUpdate = [
            'nama_layanan' => $request->nama_layanan,
            'kategori'     => $request->kategori,
        ];

        if ($request->hasFile('gambar_logo')) {
            $layananLama = DB::table('tabel_layanan')->where('id_layanan', $request->id_layanan)->first();
            
            if ($layananLama && Storage::exists('public/' . $layananLama->gambar_logo)) {
                Storage::delete('public/' . $layananLama->gambar_logo);
            }

            $ekstensi = $request->file('gambar_logo')->getClientOriginalExtension();
            $namaFile = time() . '_update.' . $ekstensi; 
            $request->file('gambar_logo')->storeAs('public', $namaFile);

            $dataUpdate['gambar_logo'] = $namaFile;
        }

        // ✅ TAMBAHKAN DI SINI
        if ($request->hasFile('gambar_logo_clean')) {
            $layananLama = DB::table('tabel_layanan')->where('id_layanan', $request->id_layanan)->first();

            if ($layananLama && $layananLama->gambar_logo_clean) {
                Storage::delete('public/' . $layananLama->gambar_logo_clean);
            }

            $ekstensiClean = $request->file('gambar_logo_clean')->getClientOriginalExtension();
            $namaFileClean = time() . '_clean_update.' . $ekstensiClean;
            $request->file('gambar_logo_clean')->storeAs('public/logo_clean', $namaFileClean);

            $dataUpdate['gambar_logo_clean'] = 'logo_clean/' . $namaFileClean;
        }
        // ✅ SAMPAI SINI

        DB::table('tabel_layanan')->where('id_layanan', $request->id_layanan)->update($dataUpdate);

        return redirect('/');
    }

    public function signin()
    {
        return view('signin');
    }

    public function registrasi(Request $request)
    {
        if ($request->password !== $request->confirm_password) {
            return redirect('/signin')->with(['error' => 'Konfirmasi password tidak cocok!']);
        }

        $cryptpassword = Hash::make($request->password);
        $split = str_split($cryptpassword, 30);

        DB::table('user')->insert([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => $split[0],
            'extend'   => $split[1],
            'status'   => 'user'
        ]);

        return redirect('/halaman-login')->with(['success' => 'Akun berhasil dibuat. Silakan Login!']);
    }

    public function login(Request $request)
    {
        $user = $request->input('username');
        $password = $request->input('password');

        $datauser = DB::table('user')->where(['username' => $user])->first();
        
        if ($datauser) {
            $combine = $datauser->password . $datauser->extend;
        }

            if ($datauser && $datauser->username == $user && Hash::check($password, $combine)) {
            $request->session()->put('username', $datauser->username);
            $request->session()->put('status', $datauser->status);
            
            return redirect('/'); // <--- Ubah menjadi garis miring saja (Katalog Utama)
        } else {
            return redirect('/')->with(['error' => 'User Name dan Password tidak ditemukan']);
        }
    }

    public function logout()
    {
        session()->forget('username');
        session()->forget('status');
        return redirect('/');
    }

    // Fungsi menampilkan detail layanan dan pilihan paket harga
    public function detailLayanan($id)
    {
        $layanan = DB::table('tabel_layanan')->where('id_layanan', $id)->first();
        $paket = DB::table('tabel_paket')->where('id_layanan', $id)->get();
        
        return view('detail', ['layanan' => $layanan, 'paket' => $paket]);
    }

    // Fungsi memproses form pembelian
    public function prosesTransaksi(Request $request)
    {
        // 1. CEK STATUS LOGIN: Cegah tamu melakukan checkout
        if (!session()->has('username')) {
            // Jika belum login, kembalikan ke halaman sebelumnya dengan pesan error khusus
            return redirect()->back()->with('error_checkout', 'Anda harus memiliki akun dan login terlebih dahulu untuk melakukan pembelian!');
        }

        // 2. PROSES TRANSAKSI: Lanjutkan jika sudah login
        DB::table('tabel_transaksi')->insert([
            'username_pembeli'  => trim(session('username')),
            'id_paket'          => $request->id_paket,
            'nama_lengkap'      => $request->nama_lengkap,
            'nomor_whatsapp'    => $request->nomor_whatsapp,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pesanan'    => 'Pending'
        ]);

        return redirect('/transaksi')->with(['success' => 'Pesanan berhasil dibuat!']);
    }

    // ==========================================
    // MANAJEMEN CRUD PAKET (KHUSUS ADMIN)
    // ==========================================

    // 1. Menampilkan form edit khusus paket
    public function tampilkanFormEditPaket($id)
    {
        if (\Session::get('status') != 'admin') {
            return redirect('/halaman-login')->with('alert', 'Anda harus login sebagai admin!');
        }

        // 1. Ambil data paket yang mau diedit
        $paket = DB::table('tabel_paket')->where('id_paket', $id)->first();
        
        // 2. Ambil data layanan induknya agar nama layanannya bisa tampil di form edit
        $layanan = DB::table('tabel_layanan')->where('id_layanan', $paket->id_layanan)->first();

        // 3. Kirim kedua data (paket dan layanan) ke halaman blade
        return view('edit_paket', compact('paket', 'layanan'));
    }

    // 2. Memproses simpan perubahan data paket
    public function updatePaket(Request $request)
{
    if (\Session::get('status') != 'admin') {
        return redirect('/halaman-login');
    }

    // PERBAIKAN UTAMA: Tambahkan 'deskripsi' agar ditangkap dari form dan disimpan ke DB
    DB::table('tabel_paket')->where('id_paket', $request->id_paket)->update([
        'nama_paket' => $request->nama_paket,
        'harga'      => $request->harga,
        'deskripsi'  => $request->deskripsi // Baris ini wajib ada!
    ]);

    // Rute pengalihan disesuaikan dengan rute detail katalog Anda
    return redirect('/detailLayanan/' . $request->id_layanan);
    }

    // 3. Menghapus data paket
    public function hapusPaket($id)
    {
        if (\Session::get('status') != 'admin') {
            return redirect('/halaman-login');
        }

        $paket = DB::table('tabel_paket')->where('id_paket', $id)->first();
        if ($paket) {
            $id_layanan = $paket->id_layanan;
            DB::table('tabel_paket')->where('id_paket', $id)->delete();
            
            // Diperbaiki rutenya agar sesuai dengan rute detailLayanan kelompok Anda
            return redirect('/detailLayanan/' . $id_layanan);
        }

        return redirect('/');
    }

    // 4. Menampilkan form tambah paket berdasarkan ID Layanan
    public function tampilkanFormTambahPaket($id_layanan)
    {
        if (\Session::get('status') != 'admin') {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        $layanan = DB::table('tabel_layanan')->where('id_layanan', $id_layanan)->first();
        return view('tambah_paket', compact('layanan'));
    }

    // 5. Memproses penyimpanan data paket baru ke database
    public function simpanPaket(Request $request)
    {
    if (\Session::get('status') != 'admin') {
        return redirect('/halaman-login');
    }

    // Pastikan 'deskripsi' ditangkap dari form input dan dimasukkan ke database
    DB::table('tabel_paket')->insert([
        'id_layanan' => $request->id_layanan,
        'nama_paket' => $request->nama_paket,
        'harga'      => $request->harga,
        'deskripsi'  => $request->deskripsi // Baris ini wajib ditambahkan!
    ]);

    return redirect('/detailLayanan/' . $request->id_layanan);
    }

    public function simulasiKonfirmasi($id)
    {
        // Pastikan user sudah login
        if (!session()->has('username')) {
            return redirect('/halaman-login');
        }

        // Update status pesanan di database menjadi 'Diproses'
        DB::table('tabel_transaksi')
            ->where('id_transaksi', $id)
            ->update(['status_pesanan' => 'Diproses']);

        // Kembalikan ke halaman riwayat transaksi
        return redirect('/transaksi');
    }
}