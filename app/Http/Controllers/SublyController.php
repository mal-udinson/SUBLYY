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
        return view('home');
    }

    public function index()
    {
        $layanan = DB::table('tabel_layanan')->get();
        return view('index', ['layanan' => $layanan]);
    }

    public function cari($nama)
    {
        $layanan = DB::table('tabel_layanan')->where('nama_layanan', 'like', "%" . $nama . "%")->get();
        return view('index', ['layanan' => $layanan]);
    }

    public function tambah(Request $request)
    {
        $ekstensi = $request->file('gambar_logo')->getClientOriginalExtension();
        $namaFile = time() . '_' . str_replace(' ', '', $request->nama_layanan) . '.' . $ekstensi;

        $request->file('gambar_logo')->storeAs('public', $namaFile);

        DB::table('tabel_layanan')->insert([
            'nama_layanan' => $request->nama_layanan,
            'kategori'     => $request->kategori,
            'gambar_logo'  => $namaFile
        ]);

        return redirect('/home');
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

        return redirect('/home');
    }

    public function show($id)
    {
        $layanan = DB::table('tabel_layanan')->where('id_layanan', $id)->get();
        return view('update', ['layanan' => $layanan]);
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

        DB::table('tabel_layanan')->where('id_layanan', $request->id_layanan)->update($dataUpdate);

        return redirect('/home');
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
            return redirect('/home');
        } else {
            return redirect('/')->with(['error' => 'User Name dan Password tidak ditemukan']);
        }
    }

    public function logout()
    {
        session()->forget('username');
        session()->forget('status');
        return view('login');
    }

    // Fungsi baru untuk menampilkan detail layanan dan pilihan paket harga
    public function detailLayanan($id)
    {
        $layanan = DB::table('tabel_layanan')->where('id_layanan', $id)->first();
        $paket = DB::table('tabel_paket')->where('id_layanan', $id)->get();
        
        return view('detail', ['layanan' => $layanan, 'paket' => $paket]);
    }

    // Fungsi baru untuk memproses form pembelian
    public function prosesTransaksi(Request $request)
    {
        DB::table('tabel_transaksi')->insert([
            'username_pembeli'  => session('username'),
            'id_paket'          => $request->id_paket,
            'nama_lengkap'      => $request->nama_lengkap,
            'nomor_whatsapp'    => $request->nomor_whatsapp,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pesanan'    => 'Pending'
        ]);

        return redirect('/home')->with(['success' => 'Pesanan berhasil dibuat!']);
    }
}