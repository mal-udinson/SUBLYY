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
            border-bottom: 1px solid #334155;
            padding: 0;
            position: relative;
            overflow: hidden;
        }

        .header-layanan::after {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: radial-gradient(ellipse at center, transparent 30%, #0f172a 100%);
            pointer-events: none;
        }

       .img-detail {
            width: 100%;
            height: 320px;
            object-fit: contain;
            display: block;
            padding: 30px 0 10px;
            transform: scale(0.65);
        }

        .header-overlay {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px 0 30px;
            background: linear-gradient(to top, rgba(15,23,42,0.95), transparent);
        }

        .card-paket {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(10px);
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

        /* CUSTOM BUTTON UTILITY FOR SUB-MANAGEMENT (ADMIN ONLY) */
        .btn-tambah-paket {
            background: rgba(14, 165, 233, 0.1);
            color: #0ea5e9;
            border: 1px solid rgba(14, 165, 233, 0.3);
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }

        .btn-tambah-paket:hover {
            background: #0ea5e9;
            color: #ffffff;
            border-color: #0ea5e9;
            box-shadow: 0 0 15px rgba(14, 165, 233, 0.4);
            transform: translateY(-1px);
        }

        .btn-edit-paket {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.25);
            transition: all 0.2s ease;
        }

        .btn-edit-paket:hover {
            background: #f59e0b;
            color: #0f172a;
            border-color: #f59e0b;
        }

        .btn-hapus-paket {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.25);
            transition: all 0.2s ease;
        }

        .btn-hapus-paket:hover {
            background: #ef4444;
            color: #ffffff;
            border-color: #ef4444;
        }
    </style>

    <script>
        window.addEventListener('load', function() {
            const header = document.querySelector('.header-layanan');
            const img = document.querySelector('.img-detail');
            const namaLayanan = "{{ strtolower($layanan->nama_layanan) }}";

            const brandConfig = {
                // ── AI Tools ──────────────────────────────────────────
                'chatgpt'           : { warna: 'rgba(255, 255, 255', gelap: false },
                'claude ai'         : { warna: 'rgba(217, 119, 87',  gelap: false },
                'gemini'            : { warna: 'rgba(255, 255, 255', gelap: false },
                'blackbox ai'       : { warna: 'rgba(0, 0, 0',       gelap: true  },
                'midjourney'        : { warna: 'rgba(255, 255, 255', gelap: false },
                'github copilot'    : { warna: 'rgba(0, 0, 0',       gelap: true  },
                // ── Streaming Video ───────────────────────────────────
                'netflix'           : { warna: 'rgba(0, 0, 0',       gelap: true  },
                'vidio'             : { warna: 'rgba(240, 28, 60',   gelap: true  },
                'disney hotstar'    : { warna: 'rgba(30, 58, 158',   gelap: true,  gradient: 'rgba(13, 21, 96'   },
                'hbo go'            : { warna: 'rgba(46, 46, 46',    gelap: true  },
                'prime video'       : { warna: 'rgba(0, 168, 224',   gelap: true  },
                'crunchyroll'       : { warna: 'rgba(247, 139, 30',  gelap: true  },
                'iqiyi'             : { warna: 'rgba(0, 219, 80',    gelap: true  },
                // ── Streaming Music ───────────────────────────────────
                'spotify'           : { warna: 'rgba(29, 185, 84',   gelap: true  },
                'apple music'       : { warna: 'rgba(255, 255, 255', gelap: false },
                'deezer'            : { warna: 'rgba(255, 255, 255', gelap: false },
                'youtube music'     : { warna: 'rgba(40, 40, 40',    gelap: true  },
                'youtube premium'   : { warna: 'rgba(0, 0, 0',       gelap: true  },
                // ── Produktivitas & Tools ─────────────────────────────
                'canva'             : { warna: 'rgba(123, 82, 211',  gelap: true,  gradient: 'rgba(0, 194, 203'  },
                'capcut'            : { warna: 'rgba(255, 255, 255', gelap: false },
                'grammarly'         : { warna: 'rgba(21, 165, 137',  gelap: true  },
                'notion'            : { warna: 'rgba(255, 255, 255', gelap: false },
                'onedrive'          : { warna: 'rgba(41, 169, 225',  gelap: true  },
                'zoom'              : { warna: 'rgba(45, 140, 255',  gelap: true  },
            };

            const config = brandConfig[namaLayanan] || { warna: 'rgba(14, 165, 233', gelap: true };

            // Handle gradient (Disney Hotstar & Canva)
            if (config.gradient) {
                header.style.background = `linear-gradient(135deg, 
                    ${config.warna}, 0.85) 0%, 
                    ${config.gradient}, 0.6) 60%, 
                    #0f172a 100%)`;
            } else {
                header.style.background = `linear-gradient(135deg, 
                    ${config.warna}, 0.8) 0%, 
                    ${config.warna}, 0.3) 50%, 
                    #0f172a 100%)`;
            }

            // Logo clean tidak perlu mixBlendMode karena sudah transparan
            img.style.mixBlendMode = 'normal';
            img.style.filter = 'drop-shadow(0 8px 24px rgba(0,0,0,0.4))';
        });
        </script>
</head>
<body>

    <div class="header-layanan mb-5">
        <a href="/" class="btn btn-outline-light btn-sm rounded-pill px-3"
        style="position:absolute; top:16px; left:16px; z-index:10;">Kembali</a>
            @if($layanan->gambar_logo_clean)
            <img src="{{ asset('storage/' . $layanan->gambar_logo_clean) }}" 
                    class="img-detail" alt="Logo">
            @else
                <img src="{{ asset('storage/' . $layanan->gambar_logo) }}" 
                    class="img-detail" alt="Logo">
            @endif
            <div class="header-overlay text-center">
            <h1 class="fw-bold text-white">{{ $layanan->nama_layanan }} Premium</h1>
            <p class="text-secondary fs-5 mb-0">Pilih paket berlangganan yang paling sesuai untuk Anda.</p>
        </div>
    </div>

    <div class="container">
        @if(session('status') == 'admin' || Session::get('status') == 'admin')
            <div class="d-flex justify-content-end mb-4">
                <a href="/paket/tambah/{{ $layanan->id_layanan }}" class="btn btn-tambah-paket d-inline-flex align-items-center gap-2 fw-semibold px-4 py-2 rounded-pill shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Tambah Paket Baru
                </a>
            </div>
        @endif

        <div class="row justify-content-center">
            @foreach($paket as $p)
            <div class="col-md-3 mb-4">
                <div class="card card-paket h-100 text-center py-4" 
                     data-bs-toggle="modal" 
                     data-bs-target="#modalCheckout" 
                     data-deskripsi="{{ $p->deskripsi }}"
                     onclick="setPaket('{{ $p->id_paket }}', '{{ $p->nama_paket }}', '{{ $p->harga }}', this)">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="text-secondary fw-bold">{{ $p->nama_paket }}</h5>
                        <h2 class="text-info fw-bold mt-3 mb-0">Rp {{ number_format($p->harga, 0, ',', '.') }}</h2>
                        
                        @if(!empty($p->deskripsi))
                            <p class="text-secondary small mt-3 mb-0 border-top border-secondary pt-2 text-start" style="white-space: pre-line; font-size: 13px;">
                                {!! nl2br(e($p->deskripsi)) !!}
                            </p>
                        @endif
                    </div>
                </div>

                @if(Session::get('status') == 'admin')
                    <div class="d-flex gap-2 mt-2 justify-content-center">
                        <a href="/paket/edit/{{ $p->id_paket }}" class="btn btn-sm btn-edit-paket w-50 fw-semibold rounded-pill">Edit</a>
                        <a href="/paket/hapus/{{ $p->id_paket }}" class="btn btn-sm btn-hapus-paket w-50 fw-semibold rounded-pill" onclick="return confirm('Yakin ingin menghapus paket {{ $p->nama_paket }}?')">Hapus</a>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="modalCheckout" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> 
            <div class="modal-content shadow-lg border-0" style="background-color: #1e293b;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold text-white">Detail Pembayaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action="/proses-transaksi" method="POST" id="formPembayaran" onsubmit="konfirmasiPembayaran(event)">
                    @csrf
                    <div class="modal-body pt-3">
                        <input type="hidden" name="id_paket" id="input_id_paket">

                        <div class="row">
                            <div class="col-md-5 border-end border-secondary mb-3 mb-md-0">
                                <div class="text-center p-3 mb-3 rounded" style="background-color: rgba(255,255,255,0.02);">
                                    <img src="{{ asset('storage/' . $layanan->gambar_logo) }}" class="img-fluid rounded mb-3" style="max-height: 120px; object-fit: contain;" alt="Logo Layanan">
                                    <h5 class="text-white fw-bold mb-0">{{ $layanan->nama_layanan }}</h5>
                                </div>

                                <div class="alert alert-info py-2 mb-3 text-center text-dark fw-semibold" id="info_paket" style="font-size: 13px;"></div>
                                
                                <div id="modal_deskripsi_paket" class="p-3 rounded d-none" style="background-color: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                                    <label class="form-label text-secondary small d-block mb-1 fw-bold">Fasilitas Paket:</label>
                                    <p class="text-white small mb-0" id="text_deskripsi_paket" style="white-space: pre-line; font-size: 13px;"></p>
                                </div>
                            </div>

                            <div class="col-md-7 ps-md-4">
                                <div class="mb-3">
                                    <label class="form-label text-secondary small">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" style="background-color: #334155; color: #fff; border: 1px solid #475569;" placeholder="Masukkan nama Anda" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small">Nomor WhatsApp Aktif</label>
                                    <input type="text" name="nomor_whatsapp" class="form-control" style="background-color: #334155; color: #fff; border: 1px solid #475569;" placeholder="+62" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small">Tipe Pemesanan</label>
                                    <select name="tipe_akun" class="form-select" style="background-color: #334155; color: #fff; border: 1px solid #475569;" required>
                                        <option value="Buatkan Akun Baru">Buatkan Akun Baru</option>
                                        <option value="Perpanjang Akun Lama">Perpanjang Akun Lama</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small">Email Akun (Wajib jika perpanjang)</label>
                                    <input type="email" name="email_layanan" class="form-control" style="background-color: #334155; color: #fff; border: 1px solid #475569;" placeholder="Kosongkan jika pesan akun baru">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small">PIN Profil Tontonan (Opsional)</label>
                                    <input type="text" name="pin_profil" class="form-control" style="background-color: #334155; color: #fff; border: 1px solid #475569;" placeholder="Masukkan 4 digit PIN profil" maxlength="4">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small d-block mb-2">Metode Pembayaran</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="metode_pembayaran" value="Qris" id="radio1" required>
                                        <label class="form-check-label text-white small" for="radio1">QRIS</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="metode_pembayaran" value="Transfer Bank" id="radio2">
                                        <label class="form-check-label text-white small" for="radio2">Transfer Bank</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="metode_pembayaran" value="E-Wallet" id="radio3">
                                        <label class="form-check-label text-white small" for="radio3">E-Wallet</label>
                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="syarat_ketentuan" required>
                                    <label class="form-check-label small text-secondary" style="font-size: 11px;" for="syarat_ketentuan">
                                        Saya setuju dengan <a href="/syarat-ketentuan" class="text-info text-decoration-none" target="_blank">syarat dan ketentuan</a> pembelian layanan digital ini.
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-info w-100 fw-bold text-white rounded-pill py-2">Bayar Sekarang</button>
                            </div>
                        </div>                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('/css/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // PERBAIKAN 2: Mengubah logika fungsi untuk membaca atribut data-deskripsi dari objek elemen kartu
        function setPaket(id, nama, harga, element) {
            // 1. Masukkan ID Paket ke input hidden
            document.getElementById('input_id_paket').value = id;
            
            // 2. Tampilkan string informasi nama paket dan harga terformat rupiah
            let hargaRupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(harga);
            document.getElementById('info_paket').innerText = "Anda memilih paket: " + nama + " (" + hargaRupiah + ")";
            
            // 3. Tarik isi data deskripsi langsung dari atribut HTML5 elemen kartu
            let deskripsi = element.getAttribute('data-deskripsi');
            
            let boxDeskripsi = document.getElementById('modal_deskripsi_paket');
            let textDeskripsi = document.getElementById('text_deskripsi_paket');
            
            // 4. Periksa eksistensi teks deskripsi
            if (deskripsi && deskripsi.trim() !== "" && deskripsi !== "null") {
                boxDeskripsi.classList.remove('d-none'); // Buka kotak pembungkus
                textDeskripsi.innerText = deskripsi;     // Suntikkan teks deskripsi database
            } else {
                boxDeskripsi.classList.add('d-none');    // Tutup jika data kosong
                textDeskripsi.innerText = "";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('error_checkout'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Akses Ditolak!',
            text: "{{ session('error_checkout') }}",
            background: '#1e293b',
            color: '#fff',
            confirmButtonColor: '#0ea5e9',
            confirmButtonText: 'Login Sekarang'
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan otomatis ke halaman login jika tombol diklik
                window.location.href = "/halaman-login"; 
            }
        });
    </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function konfirmasiPembayaran(event) {
            // Mencegah form langsung terkirim
            event.preventDefault(); 

            // 1. CEK LOGIN LANGSUNG DI JAVASCRIPT
            // Mengambil status session dari Laravel
            let statusLogin = {{ session()->has('username') ? 'true' : 'false' }};

            if (!statusLogin) {
                // Jika belum login, tampilkan peringatan dan hentikan proses
                Swal.fire({
                    icon: 'warning',
                    title: 'Akses Ditolak!',
                    text: 'Anda harus memiliki akun dan login terlebih dahulu untuk melakukan pembelian!',
                    background: '#1e293b',
                    color: '#fff',
                    confirmButtonColor: '#0ea5e9',
                    confirmButtonText: 'Login Sekarang'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/halaman-login";
                    }
                });
                
                return; // Perintah ini mencegah script lanjut ke popup pembayaran bawah
            }

            // 2. JIKA SUDAH LOGIN, TAMPILKAN POPUP METODE PEMBAYARAN
            let metode = document.querySelector('input[name="metode_pembayaran"]:checked').value;
            let titleModal = '';
            let htmlModal = '';

            if (metode === 'Qris') {
                titleModal = 'Pembayaran QRIS';
                htmlModal = `
                    <p class="text-secondary small mb-2">Scan QR Code di bawah ini menggunakan aplikasi m-Banking atau E-Wallet Anda.</p>
                    <div class="bg-white p-3 rounded d-inline-block mb-3">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=Pembayaran+SUBLY+Digital" alt="QRIS" class="img-fluid rounded">
                    </div>
                    <p class="text-white fw-bold mb-0">a.n. SUBLY DIGITAL</p>
                `;
            } else if (metode === 'Transfer Bank') {
                titleModal = 'Transfer Bank BCA';
                htmlModal = `
                    <p class="text-secondary small mb-3">Silakan transfer nominal sesuai harga paket ke rekening berikut:</p>
                    <div class="p-3 rounded mb-3" style="background-color: rgba(255,255,255,0.05); border: 1px solid #334155;">
                        <h4 class="text-info fw-bold mb-1">BCA</h4>
                        <h3 class="text-white mb-0" style="letter-spacing: 2px;">8730 123 456</h3>
                        <p class="text-secondary small mt-1 mb-0">a.n. PT SUBLY DIGITAL</p>
                    </div>
                    <p class="text-warning small mb-0">Pastikan nominal transfer tepat hingga 3 digit terakhir.</p>
                `;
            } else if (metode === 'E-Wallet') {
                titleModal = 'Pembayaran E-Wallet';
                htmlModal = `
                    <p class="text-secondary small mb-3">Silakan transfer ke nomor DANA / GoPay / OVO berikut:</p>
                    <div class="p-3 rounded mb-3" style="background-color: rgba(255,255,255,0.05); border: 1px solid #334155;">
                        <h3 class="text-white mb-0" style="letter-spacing: 2px;">0812 3456 7890</h3>
                        <p class="text-secondary small mt-1 mb-0">a.n. SUBLY DIGITAL</p>
                    </div>
                `;
            }

            Swal.fire({
                title: titleModal,
                html: htmlModal,
                background: '#1e293b',
                color: '#fff',
                showCancelButton: true,
                confirmButtonColor: '#0ea5e9',
                cancelButtonColor: '#475569',
                confirmButtonText: 'Saya Sudah Bayar',
                cancelButtonText: 'Batal / Nanti Saja',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formPembayaran').submit();
                }
            });
        }
    </script>
</body>

</body>
</html>