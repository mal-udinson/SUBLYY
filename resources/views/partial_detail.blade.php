   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <style>
       body {
    background: #080e1a;
    font-family: 'Poppins', 'Segoe UI', system-ui, sans-serif;
    color: #f1f5f9;
    min-height: 100vh;
    overflow-x: hidden;
}

/* ===== HEADER ===== */
.header-layanan {
    position: relative;
    overflow: hidden;
    padding-bottom: 48px;
    border-bottom: 1px solid rgba(56, 189, 248, 0.3);
    box-shadow: 0 1px 0 rgba(56, 189, 248, 0.15);
}

/* Dot pattern di header */
.header-layanan::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(56, 189, 248, 0.35) 1.2px, transparent 1.2px);
    background-size: 28px 28px;
    opacity: 0.2;
    pointer-events: none;
    z-index: 0;
}

/* Gradient fade ke bawah supaya teks terbaca */
.header-layanan::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(8,14,26,0.05) 0%,
        rgba(8,14,26,0.15) 40%,
        rgba(8,14,26,0.75) 80%,
        rgba(8,14,26,0.95) 100%
    );
    pointer-events: none;
    z-index: 1;
}

.img-detail {
    width: 100%;
    height: 320px;
    object-fit: contain;
    display: block;
    padding: 40px 0 8px;
    transform: scale(0.85);
    position: relative;
    z-index: 2;
}

.header-overlay {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 20px 0 32px;
    text-align: center;
    z-index: 3;
}

.header-overlay h1 {
    font-size: 36px;
    font-weight: 800;
    letter-spacing: -0.5px;
    color: #fff;
    margin-bottom: 8px;
}

.header-overlay p {
    font-size: 14px;
    color: #94a3b8;
    margin: 0;
}

/* Tombol Kembali */
.btn-kembali {
    position: absolute;
    top: 16px;
    left: 16px;
    z-index: 10;
    background: rgba(8,14,26,0.5);
    border: 1px solid rgba(56,189,248,0.3);
    color: #7dd3fc;
    font-size: 13px;
    font-weight: 600;
    padding: 6px 18px;
    border-radius: 20px;
    text-decoration: none;
    backdrop-filter: blur(8px);
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-kembali:hover {
    background: rgba(56,189,248,0.15);
    border-color: rgba(56,189,248,0.5);
    color: #fff;
}

/* ===== SECTION PAKET (dot pattern) ===== */
.paket-section {
    padding: 48px 0 64px;
    position: relative;
    background:
        radial-gradient(ellipse at 20% 0%, rgba(14,165,233,0.07) 0%, transparent 50%),
        radial-gradient(ellipse at 80% 100%, rgba(56,189,248,0.05) 0%, transparent 50%),
        #080e1a;
}

.paket-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(56,189,248,0.4) 1.2px, transparent 1.2px);
    background-size: 28px 28px;
    opacity: 0.45;
    pointer-events: none;
    z-index: 0;
}

.paket-section > * {
    position: relative;
    z-index: 1;
}

/* ===== CARD PAKET ===== */
.card-paket {
    background: linear-gradient(145deg,
        rgba(14,42,80,0.35) 0%,
        rgba(10,28,58,0.28) 40%,
        rgba(6,16,36,0.2) 100%);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(56,189,248,0.15);
    border-radius: 20px;
    transition: all 0.35s cubic-bezier(0.34,1.56,0.64,1);
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

/* Glow line di atas card */
.card-paket::before {
    content: '';
    position: absolute;
    top: 0; left: 10%; right: 10%;
    height: 1px;
    background: linear-gradient(to right,
        transparent,
        rgba(56,189,248,0.5),
        transparent);
    pointer-events: none;
}

/* Glow sudut kiri bawah */
.card-paket::after {
    content: '';
    position: absolute;
    bottom: -30px; left: -30px;
    width: 120px; height: 120px;
    background: radial-gradient(ellipse,
        rgba(14,165,233,0.12) 0%,
        transparent 70%);
    pointer-events: none;
}

.card-paket:hover {
    transform: translateY(-8px) scale(1.02);
    border-color: rgba(56,189,248,0.5);
    box-shadow:
        0 20px 50px rgba(0,0,0,0.5),
        0 0 0 1px rgba(56,189,248,0.25),
        0 0 30px rgba(56,189,248,0.08);
    background: linear-gradient(145deg,
        rgba(14,52,100,0.45) 0%,
        rgba(10,34,72,0.35) 40%,
        rgba(6,20,48,0.28) 100%);
}

.card-paket .card-body {
    padding: 28px 24px;
    position: relative;
    z-index: 1;
}

.card-paket .card-body h5 {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #94a3b8;
    letter-spacing: 0.3px;
    margin-bottom: 16px;
}

.card-paket .card-body h2 {
    font-family: 'Poppins', sans-serif;
    font-size: 30px;
    font-weight: 800;
    color: #38bdf8;
    letter-spacing: -0.5px;
    text-shadow: 0 0 20px rgba(56,189,248,0.3);
    margin-bottom: 0;
}

/* Garis pemisah harga dan deskripsi */
.card-paket .border-top {
    border-color: rgba(56,189,248,0.12) !important;
    margin-top: 16px !important;
    padding-top: 16px !important;
}

.card-paket p.text-secondary {
    font-family: 'Poppins', sans-serif;
    font-size: 12.5px !important;
    color: #64748b !important;
    line-height: 1.7;
}

/* ===== MODAL ===== */
.modal-content {
    background: linear-gradient(160deg, #1a2744 0%, #0f172a 100%);
    color: #f8fafc;
    border-radius: 20px;
    border: 1px solid rgba(56,189,248,0.15);
    box-shadow: 0 25px 60px rgba(0,0,0,0.7);
}

.modal-header {
    border-bottom: 1px solid rgba(56,189,248,0.1);
}

.modal-footer {
    border-top: 1px solid rgba(56,189,248,0.1);
}

.form-control, .form-select {
    background-color: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    color: #f1f5f9;
    border-radius: 10px;
}

.form-control:focus, .form-select:focus {
    background-color: rgba(14,165,233,0.06);
    color: #ffffff;
    border-color: rgba(56,189,248,0.45);
    box-shadow: 0 0 0 3px rgba(56,189,248,0.1);
}

/* ===== ADMIN BUTTONS ===== */
.btn-tambah-paket {
    background: rgba(14,165,233,0.08);
    color: #38bdf8;
    border: 1px solid rgba(56,189,248,0.3);
    border-radius: 30px;
    font-size: 13px;
    font-weight: 600;
    padding: 8px 20px;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-tambah-paket:hover {
    background: #0ea5e9;
    color: #fff;
    border-color: #0ea5e9;
    box-shadow: 0 0 20px rgba(14,165,233,0.35);
}

.btn-edit-paket {
    background: rgba(234,179,8,0.1);
    color: #facc15;
    border: 1px solid rgba(234,179,8,0.25);
    border-radius: 20px;
    transition: all 0.2s;
    font-size: 12px;
    font-weight: 600;
}

.btn-edit-paket:hover {
    background: #eab308;
    color: #0f172a;
    border-color: #eab308;
}

.btn-hapus-paket {
    background: rgba(239,68,68,0.1);
    color: #f87171;
    border: 1px solid rgba(239,68,68,0.25);
    border-radius: 20px;
    transition: all 0.2s;
    font-size: 12px;
    font-weight: 600;
}

.btn-hapus-paket:hover {
    background: #ef4444;
    color: #fff;
    border-color: #ef4444;
}

::-webkit-scrollbar { width: 2px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: #38bdf8; border-radius: 2px; }
     
/* ===== SWEETALERT CUSTOM ===== */
.swal-subly {
    border: 1px solid rgba(56,189,248,0.2) !important;
    border-radius: 20px !important;
    box-shadow: 0 25px 60px rgba(0,0,0,0.7), 0 0 40px rgba(56,189,248,0.08) !important;
}

.swal2-icon.swal2-warning {
    border-color: #f59e0b !important;
    color: #f59e0b !important;
}

/* ===== MODAL PERBAGUS ===== */
.modal-content {
    background: linear-gradient(160deg, #0f1f3d 0%, #080e1a 100%) !important;
    border: 1px solid rgba(56,189,248,0.2) !important;
    border-radius: 20px !important;
    box-shadow: 0 30px 80px rgba(0,0,0,0.8) !important;
}

.modal-header {
    border-bottom: 1px solid rgba(56,189,248,0.1) !important;
    padding: 20px 24px 16px !important;
}

.modal-title {
    font-family: 'Poppins', sans-serif !important;
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #fff !important;
}

.modal-body {
    padding: 20px 24px !important;
}

/* Form inputs di modal */
.modal .form-control,
.modal .form-select {
    background: rgba(255,255,255,0.04) !important;
    border: 1px solid rgba(255,255,255,0.08) !important;
    color: #f1f5f9 !important;
    border-radius: 10px !important;
    font-size: 13px !important;
    padding: 10px 14px !important;
    font-family: 'Poppins', sans-serif !important;
}

.modal .form-control:focus,
.modal .form-select:focus {
    background: rgba(14,165,233,0.06) !important;
    border-color: rgba(56,189,248,0.4) !important;
    box-shadow: 0 0 0 3px rgba(56,189,248,0.1) !important;
    color: #fff !important;
}

.modal .form-label {
    font-family: 'Poppins', sans-serif !important;
    font-size: 12px !important;
    font-weight: 600 !important;
    color: #64748b !important;
    letter-spacing: 0.3px !important;
    margin-bottom: 6px !important;
}

/* Radio buttons */
.modal .form-check-input:checked {
    background-color: #0ea5e9 !important;
    border-color: #0ea5e9 !important;
}

.modal .form-check-label {
    font-family: 'Poppins', sans-serif !important;
    font-size: 13px !important;
}

/* Tombol Bayar */
.modal .btn-info {
    background: linear-gradient(135deg, #0ea5e9, #0284c7) !important;
    border: none !important;
    border-radius: 30px !important;
    font-family: 'Poppins', sans-serif !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    padding: 12px !important;
    box-shadow: 0 0 20px rgba(14,165,233,0.35) !important;
    transition: all 0.2s !important;
    letter-spacing: 0.3px !important;
}

.modal .btn-info:hover {
    box-shadow: 0 0 32px rgba(14,165,233,0.55) !important;
    transform: translateY(-1px) !important;
}

/* Alert info paket */
#info_paket {
    background: rgba(14,165,233,0.1) !important;
    border: 1px solid rgba(56,189,248,0.25) !important;
    border-radius: 10px !important;
    color: #38bdf8 !important;
    font-family: 'Poppins', sans-serif !important;
    font-size: 12px !important;
}

/* Checkbox syarat */
.modal .form-check-input[type="checkbox"] {
    border-color: rgba(56,189,248,0.3) !important;
    background: transparent !important;
    border-radius: 4px !important;
}

.modal .form-check-input[type="checkbox"]:checked {
    background-color: #0ea5e9 !important;
    border-color: #0ea5e9 !important;
}

/* ===== FIX DROPDOWN OPTION ===== */
.modal .form-select option {
    background-color: #1e3a5f !important;
    color: #f1f5f9 !important;
    font-family: 'Poppins', sans-serif !important;
    font-size: 13px !important;
}

.modal select option:hover,
.modal select option:checked {
    background-color: #0ea5e9 !important;
    color: #fff !important;
}

/* Fix input putih saat diisi / autofill */
.modal input:-webkit-autofill,
.modal input:-webkit-autofill:hover,
.modal input:-webkit-autofill:focus,
.modal input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 999px #1e3a5f inset !important;
    -webkit-text-fill-color: #f1f5f9 !important;
    caret-color: #f1f5f9 !important;
}

.modal .form-control:not(:placeholder-shown) {
    background-color: #1e3a5f !important;
    color: #f1f5f9 !important;
    border-color: rgba(56,189,248,0.3) !important;
}

/* ===== RADIO METODE PEMBAYARAN ===== */
.radio-metode {
    cursor: pointer;
    user-select: none;
}

.radio-metode input[type="radio"] {
    display: none;
}

.radio-metode span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    color: #64748b;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    transition: all 0.2s ease;
}

.radio-metode span:hover {
    border-color: rgba(56,189,248,0.3);
    color: #94a3b8;
}

.radio-metode input[type="radio"]:checked + span {
    background: rgba(14,165,233,0.15);
    border-color: rgba(56,189,248,0.5);
    color: #38bdf8;
    box-shadow: 0 0 12px rgba(56,189,248,0.15);
}

.header-layanan::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 80px;
    background: linear-gradient(to bottom, #080e1a 0%, transparent 100%);
    z-index: 5;
    pointer-events: none;
}
    </style>

    <script>
        (function() {
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
        })();

        
        </script>
   <div class="header-layanan">
    {{-- Gradient overlay atas --}}
    <div style="position:absolute;top:0;left:0;right:0;height:100px;background:linear-gradient(to bottom, #080e1a 0%, transparent 100%);z-index:5;pointer-events:none;"></div>
    <a href="/" class="btn-kembali" id="btn-kembali-spa">
        ← Kembali
    </a>
    @if($layanan->gambar_logo_clean)
        <img src="{{ asset('storage/' . $layanan->gambar_logo_clean) }}" class="img-detail" alt="Logo">
    @else
        <img src="{{ asset('storage/' . $layanan->gambar_logo) }}" class="img-detail" alt="Logo">
    @endif
    <div class="header-overlay">
        <h1>{{ $layanan->nama_layanan }} Premium</h1>
        <p>Pilih paket berlangganan yang paling sesuai untuk Anda.</p>
    </div>
</div>

    <div class="paket-section">
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
            <div class="col-md-3 mb-4 d-flex flex-column"> 
                
                <div class="card card-paket flex-grow-1 text-center py-4" 
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
                    <div class="d-flex gap-2 mt-3 justify-content-center">
                        <a href="/paket/edit/{{ $p->id_paket }}" class="btn btn-sm btn-edit-paket w-50 fw-semibold rounded-pill">Edit</a>
                        <a href="/paket/hapus/{{ $p->id_paket }}" class="btn btn-sm btn-hapus-paket w-50 fw-semibold rounded-pill" onclick="return confirm('Yakin ingin menghapus paket {{ $p->nama_paket }}?')">Hapus</a>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
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
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        style="background-color:#1e3a5f;color:#f1f5f9;border:1px solid rgba(56,189,248,0.2);"
                                        placeholder="Masukkan nama Anda" required>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small">Nomor WhatsApp Aktif</label>
                                   <input type="text" name="nomor_whatsapp" class="form-control"
                                        style="background-color:#1e3a5f;color:#f1f5f9;border:1px solid rgba(56,189,248,0.2);"
                                        placeholder="+62" required>
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
                                    <input type="email" name="email_layanan" class="form-control"
                                        style="background-color:#1e3a5f;color:#f1f5f9;border:1px solid rgba(56,189,248,0.2);"
                                        placeholder="Kosongkan jika pesan akun baru">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small">PIN Profil Tontonan (Opsional)</label>
                                    <input type="password" name="pin_profil" class="form-control"
                                            style="background-color:#1e3a5f;color:#f1f5f9;border:1px solid rgba(56,189,248,0.2);"
                                            placeholder="Masukkan 4 digit PIN profil" maxlength="4">
                                </div>

                                <div class="mb-3">
    <label class="form-label text-secondary small d-block mb-2">Metode Pembayaran</label>
    <div class="d-flex gap-2 flex-wrap">

        <label class="radio-metode">
            <input type="radio" name="metode_pembayaran" value="Qris" required>
            <span> QRIS</span>
        </label>

        <label class="radio-metode">
            <input type="radio" name="metode_pembayaran" value="Transfer Bank">
            <span> Transfer Bank</span>
        </label>

        <label class="radio-metode">
            <input type="radio" name="metode_pembayaran" value="E-Wallet">
            <span> E-Wallet</span>
        </label>

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
    title: 'Login Dulu Ya! 🔐',
    html: `
        <p style="color:#94a3b8;font-size:14px;margin:0;">
            Kamu harus punya akun SUBLY dan login terlebih dahulu untuk melakukan pembelian layanan premium.
        </p>
    `,
    background: 'linear-gradient(160deg, #1a2744 0%, #0f172a 100%)',
    color: '#fff',
    confirmButtonColor: '#0ea5e9',
    confirmButtonText: ' Login Sekarang',
    showCancelButton: true,
    cancelButtonText: 'Nanti Saja',
    cancelButtonColor: '#334155',
    borderRadius: '20px',
    customClass: {
        popup: 'swal-subly',
        confirmButton: 'swal-btn-confirm',
        cancelButton: 'swal-btn-cancel',
    }
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
       <p style="color:#64748b;font-size:13px;margin-bottom:16px;">
        Scan QR Code berikut menggunakan m-Banking atau E-Wallet kamu.
    </p>
    <div style="display:flex;flex-direction:column;align-items:center;gap:14px;">
        <div style="padding:12px;background:#fff;border-radius:16px;box-shadow:0 0 30px rgba(56,189,248,0.2);">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=Pembayaran+SUBLY+Digital" 
                alt="QRIS" style="display:block;border-radius:8px;">
        </div>
        <div style="padding:10px 20px;background:rgba(56,189,248,0.06);border:1px solid rgba(56,189,248,0.15);border-radius:10px;">
            <span style="color:#94a3b8;font-size:12px;">a.n.</span>
            <span style="color:#fff;font-size:13px;font-weight:700;margin-left:4px;">SUBLY DIGITAL</span>
        </div>
    </div>
`;

} else if (metode === 'Transfer Bank') {
    titleModal = 'Transfer Bank BCA';
    htmlModal = `
        <p style="color:#64748b;font-size:13px;margin-bottom:16px;">
            Transfer nominal sesuai harga paket ke rekening berikut:
        </p>
        <div style="background:linear-gradient(135deg,rgba(14,42,80,0.8),rgba(8,14,26,0.9));border:1px solid rgba(56,189,248,0.2);border-radius:16px;padding:20px;margin-bottom:14px;position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(to right,transparent,#38bdf8,transparent);"></div>
            <div style="font-size:13px;font-weight:700;color:#38bdf8;letter-spacing:1px;margin-bottom:8px;">BCA</div>
            <div style="font-size:28px;font-weight:800;color:#fff;letter-spacing:3px;margin-bottom:6px;">8730 123 456</div>
            <div style="font-size:11px;color:#475569;">a.n. PT SUBLY DIGITAL</div>
        </div>
        <div style="background:rgba(234,179,8,0.08);border:1px solid rgba(234,179,8,0.2);border-radius:10px;padding:10px 14px;">
            <span style="color:#facc15;font-size:12px;font-weight:600;">⚠ Pastikan nominal transfer tepat hingga 3 digit terakhir.</span>
        </div>
    `;
} else if (metode === 'E-Wallet') {
    titleModal = 'Pembayaran E-Wallet';
    htmlModal = `
        <p style="color:#64748b;font-size:13px;margin-bottom:16px;">
            Transfer ke nomor DANA / GoPay / OVO berikut:
        </p>
        <div style="background:linear-gradient(135deg,rgba(14,42,80,0.8),rgba(8,14,26,0.9));border:1px solid rgba(56,189,248,0.2);border-radius:16px;padding:20px;margin-bottom:14px;position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(to right,transparent,#38bdf8,transparent);"></div>
            <div style="display:flex;justify-content:center;gap:8px;margin-bottom:12px;">
                <span style="font-size:11px;font-weight:600;color:#38bdf8;background:rgba(56,189,248,0.1);border:1px solid rgba(56,189,248,0.2);padding:3px 10px;border-radius:20px;">DANA</span>
                <span style="font-size:11px;font-weight:600;color:#38bdf8;background:rgba(56,189,248,0.1);border:1px solid rgba(56,189,248,0.2);padding:3px 10px;border-radius:20px;">GoPay</span>
                <span style="font-size:11px;font-weight:600;color:#38bdf8;background:rgba(56,189,248,0.1);border:1px solid rgba(56,189,248,0.2);padding:3px 10px;border-radius:20px;">OVO</span>
            </div>
            <div style="font-size:26px;font-weight:800;color:#fff;letter-spacing:3px;margin-bottom:6px;">0812 3456 7890</div>
            <div style="font-size:11px;color:#475569;">a.n. SUBLY DIGITAL</div>
        </div>
        <div style="background:rgba(14,165,233,0.06);border:1px solid rgba(56,189,248,0.15);border-radius:10px;padding:10px 14px;">
            <span style="color:#38bdf8;font-size:12px;font-weight:600;">⚡ Konfirmasi pembayaran ke CS kami setelah transfer.</span>
        </div>
    `;
}

            let iconMetode = metode === 'Qris' ? '📱' : metode === 'Transfer Bank' ? '🏦' : '💳';

Swal.fire({
    title: `<span style="font-size:18px;font-weight:700;">${iconMetode} ${titleModal}</span>`,
    html: htmlModal,
    background: 'linear-gradient(160deg, #1a2744 0%, #0f172a 100%)',
    color: '#fff',
    showCancelButton: true,
    confirmButtonColor: '#0ea5e9',
    cancelButtonColor: '#334155',
    confirmButtonText: '✅ Saya Sudah Bayar',
    cancelButtonText: 'Batal',
    reverseButtons: true,
    customClass: {
        popup: 'swal-subly',
    }
}).then((result) => {
    if (result.isConfirmed) {
        // Tampilkan loading dulu
        Swal.fire({
    title: '<span style="font-size:20px;font-weight:800;">Memproses Pesanan</span>',
    html: `
        <div style="padding:8px 0;">
            <p style="color:#64748b;font-size:13px;margin-bottom:20px;">Mohon tunggu sebentar...</p>
            <div style="display:flex;justify-content:center;gap:8px;">
                <div style="width:8px;height:8px;border-radius:50%;background:#38bdf8;animation:dot-bounce 1.2s infinite 0s;"></div>
                <div style="width:8px;height:8px;border-radius:50%;background:#38bdf8;animation:dot-bounce 1.2s infinite 0.2s;"></div>
                <div style="width:8px;height:8px;border-radius:50%;background:#38bdf8;animation:dot-bounce 1.2s infinite 0.4s;"></div>
            </div>
        </div>
        <style>
            @keyframes dot-bounce {
                0%,80%,100%{transform:scale(0.6);opacity:0.4}
                40%{transform:scale(1);opacity:1}
            }
        </style>
    `,
    background: 'linear-gradient(160deg, #1a2744 0%, #0f172a 100%)',
    color: '#fff',
    allowOutsideClick: false,
    showConfirmButton: false,
    customClass: { popup: 'swal-subly' }
});
setTimeout(() => {
                    document.getElementById('formPembayaran').submit();
                }, 1400);
            }  // tutup if isConfirmed (loading)
        });    // tutup Swal loading
    }
    </script>