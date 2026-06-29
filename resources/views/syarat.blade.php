<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan - SUBLY</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: #080e1a;
            font-family: 'Poppins', sans-serif;
            color: #f1f5f9;
            min-height: 100vh;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar { width: 2px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #38bdf8; border-radius: 2px; }

        /* ===== DOT PATTERN BG ===== */
        .page-bg {
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(56,189,248,0.35) 1.2px, transparent 1.2px);
            background-size: 28px 28px;
            opacity: 0.18;
            pointer-events: none;
            z-index: 0;
        }

        /* Glow atas */
        .page-glow {
            position: fixed;
            top: -150px;
            left: 50%;
            transform: translateX(-50%);
            width: 800px;
            height: 500px;
            background: radial-gradient(ellipse, rgba(14,165,233,0.13) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }

        /* Glow bawah kanan */
        .page-glow-bottom {
            position: fixed;
            bottom: -100px;
            right: -100px;
            width: 500px;
            height: 500px;
            background: radial-gradient(ellipse, rgba(56,189,248,0.07) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }

        /* ===== TOPBAR ===== */
        .topbar {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 48px;
            border-bottom: 1px solid rgba(56,189,248,0.1);
            background: rgba(8,14,26,0.8);
            backdrop-filter: blur(16px);
        }

        .topbar-brand {
            font-size: 22px;
            font-weight: 800;
            color: #38bdf8;
            text-decoration: none;
            text-shadow: 0 0 18px rgba(56,189,248,0.6);
            letter-spacing: -0.5px;
        }

        .btn-kembali {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 20px;
            border-radius: 30px;
            background: rgba(56,189,248,0.06);
            border: 1px solid rgba(56,189,248,0.25);
            color: #7dd3fc;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-kembali:hover {
            background: rgba(56,189,248,0.14);
            border-color: rgba(56,189,248,0.5);
            color: #fff;
            transform: translateX(-3px);
        }

        /* ===== MAIN WRAP ===== */
        .main-wrap {
            position: relative;
            z-index: 1;
            max-width: 820px;
            margin: 0 auto;
            padding: 48px 24px 80px;
        }

        /* ===== PAGE HEADER ===== */
        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #38bdf8;
            background: rgba(56,189,248,0.08);
            border: 1px solid rgba(56,189,248,0.2);
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 18px;
        }

        .page-title {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: -1px;
            color: #fff;
            line-height: 1.15;
            margin-bottom: 10px;
        }

        .page-title span { color: #38bdf8; }

        .page-subtitle {
            font-size: 13px;
            color: #475569;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .page-subtitle::before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 1px;
            background: rgba(56,189,248,0.4);
        }

        /* ===== CONTENT CARD ===== */
        .content-card {
            background: linear-gradient(160deg, rgba(14,42,80,0.3) 0%, rgba(6,16,36,0.2) 100%);
            border: 1px solid rgba(56,189,248,0.12);
            border-radius: 24px;
            padding: 40px 44px;
            position: relative;
            overflow: hidden;
        }

        /* Glow line atas card */
        .content-card::before {
            content: '';
            position: absolute;
            top: 0; left: 8%; right: 8%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(56,189,248,0.5), transparent);
        }

        /* ===== INTRO TEXT ===== */
        .intro-text {
            font-size: 14px;
            color: #94a3b8;
            line-height: 1.85;
            text-align: justify;
            margin-bottom: 36px;
            padding-bottom: 28px;
            border-bottom: 1px solid rgba(56,189,248,0.08);
        }

        /* ===== SECTION ===== */
        .sk-section {
            margin-bottom: 32px;
        }

        .sk-section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .sk-section-num {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: rgba(14,165,233,0.12);
            border: 1px solid rgba(56,189,248,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 800;
            color: #38bdf8;
            flex-shrink: 0;
        }

        .sk-section-title {
            font-size: 15px;
            font-weight: 700;
            color: #38bdf8;
            letter-spacing: -0.2px;
        }

        /* ===== LIST ITEMS ===== */
        .sk-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sk-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 13.5px;
            color: #94a3b8;
            line-height: 1.75;
            text-align: justify;
        }

        .sk-list li::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: rgba(56,189,248,0.5);
            flex-shrink: 0;
            margin-top: 9px;
        }

        .sk-list li strong {
            color: #e2e8f0;
            font-weight: 600;
        }

        /* Divider antar section */
        .sk-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(56,189,248,0.08), transparent);
            margin: 28px 0;
        }

        /* ===== ALERT BOX ===== */
        .sk-alert {
            background: rgba(14,165,233,0.06);
            border: 1px solid rgba(56,189,248,0.18);
            border-radius: 14px;
            padding: 18px 22px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-top: 36px;
        }

        .sk-alert-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(56,189,248,0.1);
            border: 1px solid rgba(56,189,248,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: #38bdf8;
            flex-shrink: 0;
        }

        .sk-alert-text {
            font-size: 13px;
            color: #94a3b8;
            line-height: 1.7;
            text-align: justify;
        }

        .sk-alert-text strong {
            color: #38bdf8;
            font-weight: 600;
        }

        /* ===== FOOTER CARD ===== */
        .footer-note {
            text-align: center;
            margin-top: 32px;
            font-size: 12px;
            color: #334155;
        }

        @media (max-width: 768px) {
            .topbar { padding: 14px 20px; }
            .main-wrap { padding: 32px 16px 60px; }
            .content-card { padding: 28px 22px; }
            .page-title { font-size: 26px; }
        }
    </style>
</head>
<body>

    <div class="page-bg"></div>
    <div class="page-glow"></div>
    <div class="page-glow-bottom"></div>

    {{-- TOPBAR --}}
    <div class="topbar">
        <a href="/" class="topbar-brand">SUBLY</a>
        <a href="{{ url()->previous() }}" class="btn-kembali">
            <i class="ti ti-arrow-left" style="font-size:14px;"></i> Kembali
        </a>
    </div>

    <div class="main-wrap">

        {{-- PAGE HEADER --}}
        <div class="page-eyebrow">
            <i class="ti ti-file-description" style="font-size:12px;"></i>
            Dokumen Resmi
        </div>
        <h1 class="page-title">Syarat & <span>Ketentuan</span> Layanan</h1>
        <p class="page-subtitle">Pembaruan Terakhir: Juni 2026</p>

        {{-- CONTENT CARD --}}
        <div class="content-card">

            <p class="intro-text">
                Selamat datang di <strong style="color:#38bdf8;">SUBLY</strong>. Dengan mengakses dan melakukan pembelian layanan di website kami, Anda dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan yang tercantum di bawah ini. Harap baca dengan seksama sebelum melakukan transaksi.
            </p>

            {{-- SECTION 1 --}}
            <div class="sk-section">
                <div class="sk-section-header">
                    <div class="sk-section-num">1</div>
                    <div class="sk-section-title">Ketentuan Umum Penggunaan</div>
                </div>
                <ul class="sk-list">
                    <li>Akun yang disediakan bersifat legal dan resmi sesuai dengan paket langganan yang dipilih oleh pelanggan.</li>
                    <li>Dilarang keras mengubah kata sandi, email, profil, atau pengaturan pembayaran pada akun berjenis <strong>Sharing</strong>.</li>
                    <li>Pelanggaran terhadap aturan penggunaan akan mengakibatkan garansi hangus dan akun ditarik tanpa pengembalian dana (refund).</li>
                    <li>SUBLY berhak menangguhkan layanan kepada pengguna yang terbukti menyalahgunakan akun premium yang diberikan.</li>
                </ul>
            </div>

            <div class="sk-divider"></div>

            {{-- SECTION 2 --}}
            <div class="sk-section">
                <div class="sk-section-header">
                    <div class="sk-section-num">2</div>
                    <div class="sk-section-title">Kebijakan Garansi</div>
                </div>
                <ul class="sk-list">
                    <li>Garansi berlaku penuh sesuai durasi paket yang Anda beli (contoh: garansi 30 hari untuk paket 1 bulan).</li>
                    <li>Klaim garansi dapat dilakukan melalui nomor WhatsApp admin dengan menyertakan bukti <strong>ID Transaksi</strong> yang valid.</li>
                    <li>Proses perbaikan akun bermasalah memakan waktu estimasi <strong>1×24 jam</strong> hari kerja sejak laporan diterima.</li>
                    <li>Garansi tidak berlaku apabila kerusakan disebabkan oleh tindakan pelanggan sendiri, seperti mengubah data akun.</li>
                </ul>
            </div>

            <div class="sk-divider"></div>

            {{-- SECTION 3 --}}
            <div class="sk-section">
                <div class="sk-section-header">
                    <div class="sk-section-num">3</div>
                    <div class="sk-section-title">Kebijakan Pengembalian Dana (Refund)</div>
                </div>
                <ul class="sk-list">
                    <li>Pengembalian dana hanya dapat diproses apabila stok akun sedang kosong dan admin tidak dapat menyediakan akun pengganti dalam waktu <strong>3×24 jam</strong>.</li>
                    <li>Pembelian yang salah dilakukan oleh pelanggan (salah pilih paket atau layanan) tidak dapat dibatalkan atau di-refund.</li>
                    <li>Refund diproses dalam bentuk saldo kredit SUBLY atau transfer balik, tergantung kesepakatan dengan tim CS kami.</li>
                </ul>
            </div>

            <div class="sk-divider"></div>

            {{-- SECTION 4 --}}
            <div class="sk-section">
                <div class="sk-section-header">
                    <div class="sk-section-num">4</div>
                    <div class="sk-section-title">Privasi & Keamanan Data</div>
                </div>
                <ul class="sk-list">
                    <li>Data pribadi yang Anda berikan (nama, nomor WhatsApp, email) hanya digunakan untuk keperluan pemrosesan transaksi.</li>
                    <li>SUBLY tidak akan menjual, menyewakan, atau membagikan data pelanggan kepada pihak ketiga manapun.</li>
                    <li>Kami menggunakan enkripsi standar industri untuk melindungi seluruh informasi transaksi Anda.</li>
                </ul>
            </div>

            {{-- ALERT --}}
            <div class="sk-alert">
                <div class="sk-alert-icon">
                    <i class="ti ti-headset"></i>
                </div>
                <div class="sk-alert-text">
                    Jika Anda memiliki pertanyaan lebih lanjut mengenai syarat dan ketentuan ini, silakan hubungi tim dukungan kami melalui WhatsApp <strong>0812-1265-9364</strong> atau Instagram <strong>@subly.id</strong>. Tim kami siap membantu Anda 7 hari seminggu.
                </div>
            </div>

        </div>

        <p class="footer-note">© 2026 SUBLY. Seluruh hak dilindungi undang-undang.</p>

    </div>
    @include('partials.turbolinks-reinit')
</body>
</html>