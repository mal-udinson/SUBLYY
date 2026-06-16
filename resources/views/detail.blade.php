<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Detail Layanan</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <style>
        body {
            background-color: #0f172a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f8fafc;
        }
        
        .header-layanan {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            padding: 40px 0;
            border-bottom: 1px solid #334155;
        }

        .img-detail {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        }

        .card-paket {
            background: rgba(30, 41, 59, 0.4); /* Dibuat sedikit transparan */
            backdrop-filter: blur(10px);      /* Efek kaca */
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card-paket:hover {
            transform: translateY(-5px);
            border-color: #0ea5e9;
            box-shadow: 0 10px 20px rgba(14, 165, 233, 0.2);
        }

        /* Styling Form Modal agar terlihat premium */
        .modal-content {
            background-color: #1e293b;
            color: #f8fafc;
            border-radius: 16px;
            border: 1px solid #334155;
        }
        
        .modal-header {
            border-bottom: 1px solid #334155;
        }
        
        .modal-footer {
            border-top: 1px solid #334155;
        }

        .form-control, .form-select {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #f8fafc;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: #0f172a;
            color: #ffffff;
            border-color: #0ea5e9;
            box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.25);
        }
    </style>
</head>
<body>

    <div class="header-layanan text-center mb-5">
        <div class="container">
            <a href="/" class="btn btn-outline-light btn-sm float-start mb-3 rounded-pill px-3">Kembali</a>
            <div class="clearfix"></div>
            
            <img src="{{ asset('storage/' . $layanan->gambar_logo) }}" class="img-detail mb-3" alt="Logo">
            <h1 class="fw-bold">{{ $layanan->nama_layanan }} Premium</h1>
            <p class="text-secondary fs-5">Pilih paket berlangganan yang paling sesuai untuk Anda.</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @foreach($paket as $p)
            <div class="col-md-3 mb-4">
                <div class="card card-paket h-100 text-center py-4" data-bs-toggle="modal" data-bs-target="#modalCheckout" onclick="setPaket('{{ $p->id_paket }}', '{{ $p->nama_paket }}', '{{ $p->harga }}')">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="text-secondary fw-bold">{{ $p->nama_paket }}</h5>
                        <h2 class="text-info fw-bold mt-3 mb-0">Rp {{ number_format($p->harga, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="modalCheckout" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Detail Pembayaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action="/proses-transaksi" method="POST">
                    @csrf
                    <div class="modal-body pt-3">
                        
                        <input type="hidden" name="id_paket" id="input_id_paket">

                        <div class="alert alert-info py-2" id="info_paket">
                            </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama Anda" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small">Nomor WhatsApp Aktif</label>
                            <input type="number" name="nomor_whatsapp" class="form-control" placeholder="0812xxxxxx" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small">Tipe Akun</label>
                            <select name="tipe_akun" class="form-select" required>
                                <option value="Perpanjang Akun Lama">Perpanjang Akun Lama</option>
                                <option value="Buat Akun Baru">Buat Akun Baru</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary small">PIN Konfirmasi (Untuk Keamanan)</label>
                            <input type="password" name="pin_keamanan" class="form-control" placeholder="Masukkan 6 digit PIN" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary small d-block">Metode Pembayaran</label>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" value="Qris" id="radio1" required>
                                <label class="form-check-label" for="radio1">QRIS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" value="Transfer Bank" id="radio2">
                                <label class="form-check-label" for="radio2">Transfer Bank</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" value="E-Wallet" id="radio3">
                                <label class="form-check-label" for="radio3">E-Wallet</label>
                            </div>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="syarat_ketentuan" required>
                            <label class="form-check-label small text-secondary" for="syarat_ketentuan">
                                Saya setuju dengan syarat dan ketentuan pembelian layanan digital ini.
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="submit" class="btn btn-info w-100 fw-bold text-white rounded-pill py-2">Bayar Sekarang</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('/css/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Fungsi untuk mengirim data paket yang diklik ke dalam form modal
        function setPaket(id, nama, harga) {
            document.getElementById('input_id_paket').value = id;
            
            // Format angka menjadi rupiah
            let hargaRupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(harga);
            
            document.getElementById('info_paket').innerHTML = "<strong>Paket Pilihan:</strong> " + nama + " <br> <strong>Total Bayar:</strong> " + hargaRupiah;
        }
    </script>
</body>
</html>