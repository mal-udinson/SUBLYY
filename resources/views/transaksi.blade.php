<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - SUBLY</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: #080e1a;
            font-family: 'Poppins', 'Segoe UI', system-ui, sans-serif;
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

        .page-glow-top {
            position: fixed;
            top: -120px;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 400px;
            background: radial-gradient(ellipse, rgba(14,165,233,0.12) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }

        /* ===== NAVBAR ===== */
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
        }

        /* ===== MAIN CONTENT ===== */
        .main-wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            margin: 0 auto;
            padding: 40px 60px 64px;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            margin-bottom: 36px;
        }

        .page-header-eyebrow {
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
            margin-bottom: 14px;
        }

        .page-header h1 {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -0.8px;
            color: #fff;
            margin-bottom: 6px;
        }

        .page-header p {
            font-size: 13.5px;
            color: #64748b;
        }

        /* ===== SUMMARY STATS ===== */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: linear-gradient(145deg, rgba(14,42,80,0.35) 0%, rgba(6,16,36,0.2) 100%);
            border: 1px solid rgba(56,189,248,0.12);
            border-radius: 16px;
            padding: 18px 20px;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 10%; right: 10%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(56,189,248,0.4), transparent);
        }

        .stat-card-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            margin-bottom: 12px;
        }

        .stat-card-num {
            font-size: 24px;
            font-weight: 800;
            color: #38bdf8;
            letter-spacing: -0.5px;
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-card-label {
            font-size: 11px;
            color: #475569;
            font-weight: 500;
        }

        /* ===== TABLE SECTION ===== */
        .table-section {
            background: linear-gradient(160deg, rgba(14,42,80,0.25) 0%, rgba(6,16,36,0.18) 100%);
            border: 1px solid rgba(56,189,248,0.12);
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .table-section::before {
            content: '';
            position: absolute;
            top: 0; left: 8%; right: 8%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(56,189,248,0.45), transparent);
        }

        /* ===== TABLE HEAD ===== */
        .table-subly thead th {
            background: rgba(8,14,26,0.7);
            border-bottom: 1px solid rgba(56,189,248,0.1);
            color: #475569;
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.9px;
            padding: 15px 20px;
            border-top: none;
            white-space: nowrap;
        }

        /* ===== TABLE BODY ===== */
        .table-subly tbody td {
            border-bottom: 1px solid rgba(255,255,255,0.04);
            vertical-align: middle;
            padding: 18px 20px;
            font-size: 13.5px;
            background: transparent;
            transition: background 0.2s;
        }

        .table-subly tbody tr:last-child td {
            border-bottom: none;
        }

        .table-subly tbody tr:hover td {
            background: rgba(56,189,248,0.03);
        }

        /* Row number */
        .row-num {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(56,189,248,0.06);
            border: 1px solid rgba(56,189,248,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: #475569;
            margin: 0 auto;
        }

        /* Service name */
        .service-name {
            font-weight: 700;
            color: #f1f5f9;
            font-size: 14px;
        }

        /* Paket badge */
        .badge-paket {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            font-weight: 600;
            color: #38bdf8;
            background: rgba(56,189,248,0.08);
            border: 1px solid rgba(56,189,248,0.2);
            padding: 5px 12px;
            border-radius: 20px;
            white-space: nowrap;
        }

        /* Harga */
        .price-text {
            font-size: 15px;
            font-weight: 800;
            color: #38bdf8;
            letter-spacing: -0.3px;
            text-shadow: 0 0 16px rgba(56,189,248,0.25);
        }

        /* Metode */
        .metode-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 600;
            color: #94a3b8;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            padding: 4px 11px;
            border-radius: 20px;
        }

        /* Waktu */
        .time-block {
            font-size: 12px;
            color: #64748b;
            line-height: 1.5;
        }

        .time-block .time-date {
            color: #94a3b8;
            font-weight: 600;
            display: block;
        }

        .time-block .time-hour {
            color: #475569;
            font-size: 11px;
        }

        /* Pelanggan (admin) */
        .customer-name {
            font-weight: 600;
            color: #e2e8f0;
            font-size: 13.5px;
            display: block;
            margin-bottom: 3px;
        }

        .customer-wa {
            font-size: 11px;
            color: #34d399;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* ===== STATUS BADGES ===== */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11.5px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .status-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-pending {
            background: rgba(245,158,11,0.1);
            color: #fbbf24;
            border: 1px solid rgba(245,158,11,0.25);
        }

        .status-pending::before { background: #fbbf24; box-shadow: 0 0 6px rgba(251,191,36,0.6); animation: pulse-dot 1.5s infinite; }

        .status-diproses {
            background: rgba(56,189,248,0.1);
            color: #38bdf8;
            border: 1px solid rgba(56,189,248,0.25);
        }

        .status-diproses::before { background: #38bdf8; box-shadow: 0 0 6px rgba(56,189,248,0.6); animation: pulse-dot 1.5s infinite; }

        .status-sukses {
            background: rgba(16,185,129,0.1);
            color: #34d399;
            border: 1px solid rgba(16,185,129,0.25);
        }

        .status-sukses::before { background: #34d399; }

        .status-batal {
            background: rgba(239,68,68,0.1);
            color: #f87171;
            border: 1px solid rgba(239,68,68,0.2);
        }

        .status-batal::before { background: #f87171; }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.7); }
        }

        /* ===== ADMIN ACTION BUTTONS ===== */
        .action-wrap { display: flex; flex-direction: column; gap: 7px; }

        .btn-confirm {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 7px 14px;
            border-radius: 10px;
            font-size: 11.5px;
            font-weight: 700;
            text-decoration: none;
            background: rgba(16,185,129,0.12);
            border: 1px solid rgba(16,185,129,0.3);
            color: #34d399;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-confirm:hover {
            background: #10b981;
            color: #fff;
            border-color: #10b981;
            box-shadow: 0 0 16px rgba(16,185,129,0.4);
        }

        .btn-reject {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 7px 14px;
            border-radius: 10px;
            font-size: 11.5px;
            font-weight: 700;
            text-decoration: none;
            background: rgba(239,68,68,0.08);
            border: 1px solid rgba(239,68,68,0.2);
            color: #f87171;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-reject:hover {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
            box-shadow: 0 0 16px rgba(239,68,68,0.4);
        }

        .btn-kirim-bukti {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 700;
            text-decoration: none;
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: #fff;
            border: none;
            box-shadow: 0 0 14px rgba(14,165,233,0.3);
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-kirim-bukti:hover {
            box-shadow: 0 0 22px rgba(14,165,233,0.55);
            color: #fff;
            transform: translateY(-1px);
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 64px 24px;
        }

        .empty-icon {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: rgba(56,189,248,0.06);
            border: 1px solid rgba(56,189,248,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 20px;
        }

        .empty-state h4 {
            font-size: 18px;
            font-weight: 700;
            color: #f1f5f9;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 13px;
            color: #475569;
            margin-bottom: 24px;
        }

        /* ===== LIVE CLOCK ===== */
        .live-clock {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            color: #38bdf8;
            background: rgba(56,189,248,0.06);
            border: 1px solid rgba(56,189,248,0.15);
            padding: 5px 14px;
            border-radius: 20px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .live-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #38bdf8;
            box-shadow: 0 0 8px rgba(56,189,248,0.8);
            animation: pulse-dot 1.5s infinite;
            flex-shrink: 0;
        }

        /* ===== MODAL BUKTI ===== */
        .modal-bukti-overlay {
            position: fixed;
            inset: 0;
            background: rgba(4,8,18,0.85);
            backdrop-filter: blur(8px);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s ease;
        }

        .modal-bukti-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        .modal-bukti {
            background: linear-gradient(160deg, #0f1f3d 0%, #080e1a 100%);
            border: 1px solid rgba(56,189,248,0.2);
            border-radius: 24px;
            width: 100%;
            max-width: 480px;
            margin: 16px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.8), 0 0 0 1px rgba(56,189,248,0.05);
            transform: translateY(20px) scale(0.97);
            transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
            position: relative;
            overflow: hidden;
        }

        .modal-bukti-overlay.active .modal-bukti {
            transform: translateY(0) scale(1);
        }

        /* Glow line atas */
        .modal-bukti::before {
            content: '';
            position: absolute;
            top: 0; left: 10%; right: 10%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(56,189,248,0.6), transparent);
        }

        .modal-bukti-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 22px 24px 18px;
            border-bottom: 1px solid rgba(56,189,248,0.08);
        }

        .modal-bukti-title {
            font-size: 16px;
            font-weight: 800;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-bukti-title-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: rgba(14,165,233,0.12);
            border: 1px solid rgba(56,189,248,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .modal-close-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            color: #64748b;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .modal-close-btn:hover {
            background: rgba(239,68,68,0.1);
            border-color: rgba(239,68,68,0.25);
            color: #f87171;
        }

        .modal-bukti-body {
            padding: 20px 24px 24px;
        }

        /* Info box paket */
        .bukti-info-box {
            background: rgba(56,189,248,0.06);
            border: 1px solid rgba(56,189,248,0.15);
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .bukti-info-label {
            font-size: 11px;
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
        }

        .bukti-info-val {
            font-size: 13.5px;
            font-weight: 700;
            color: #f1f5f9;
        }

        .bukti-info-harga {
            font-size: 18px;
            font-weight: 800;
            color: #38bdf8;
            text-shadow: 0 0 16px rgba(56,189,248,0.3);
        }

        /* Upload area */
        .upload-area {
            border: 2px dashed rgba(56,189,248,0.2);
            border-radius: 16px;
            padding: 32px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.25s;
            background: rgba(56,189,248,0.02);
            position: relative;
            margin-bottom: 16px;
        }

        .upload-area:hover, .upload-area.drag-over {
            border-color: rgba(56,189,248,0.5);
            background: rgba(56,189,248,0.05);
        }

        .upload-area input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .upload-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(14,165,233,0.1);
            border: 1px solid rgba(56,189,248,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            font-size: 22px;
            color: #38bdf8;
        }

        .upload-title {
            font-size: 13.5px;
            font-weight: 700;
            color: #e2e8f0;
            margin-bottom: 5px;
        }

        .upload-sub {
            font-size: 11.5px;
            color: #475569;
        }

        /* Preview gambar */
        .upload-preview {
            display: none;
            margin-bottom: 16px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(56,189,248,0.2);
            position: relative;
        }

        .upload-preview img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            display: block;
        }

        .upload-preview-label {
            position: absolute;
            top: 8px;
            left: 8px;
            background: rgba(16,185,129,0.9);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
            letter-spacing: 0.5px;
        }

        /* Catatan input */
        .bukti-catatan {
            width: 100%;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 10px;
            padding: 10px 14px;
            color: #f1f5f9;
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
            resize: none;
            transition: all 0.2s;
            margin-bottom: 16px;
        }

        .bukti-catatan:focus {
            outline: none;
            border-color: rgba(56,189,248,0.4);
            background: rgba(56,189,248,0.04);
            box-shadow: 0 0 0 3px rgba(56,189,248,0.08);
        }

        .bukti-catatan::placeholder { color: #334155; }

        .btn-kirim-submit {
            width: 100%;
            padding: 13px;
            border-radius: 30px;
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(14,165,233,0.35);
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: 'Poppins', sans-serif;
        }

        .btn-kirim-submit:hover {
            box-shadow: 0 0 32px rgba(14,165,233,0.55);
            transform: translateY(-1px);
        }

        .form-label-bukti {
            font-size: 11px;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
            margin-bottom: 8px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .topbar { padding: 16px 20px; }
            .main-wrap { padding: 28px 16px 48px; }
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .page-header h1 { font-size: 26px; }
        }

        @media (max-width: 576px) {
            .stats-row { grid-template-columns: 1fr 1fr; gap: 10px; }
            .table-section { border-radius: 14px; }
        }
        @media (max-width: 768px) {
    .topbar {
        flex-direction: column;
        align-items: stretch;
        gap: 10px;
        padding: 14px 16px;
    }

    .topbar-brand {
        text-align: center;
        font-size: 18px;
    }

    .table-scroll-hint {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    color: #38bdf8;
    background: rgba(56,189,248,0.06);
    border: 1px solid rgba(56,189,248,0.15);
    padding: 8px 14px;
    border-radius: 20px;
    margin-bottom: 12px;
    width: fit-content;
}

    .live-clock {
        justify-content: center;
        font-size: 11px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .btn-kembali {
        justify-content: center;
        font-size: 12px;
    }
}
    </style>
</head>
<body>

    <div class="page-bg"></div>
    <div class="page-glow-top"></div>

    {{-- ===== TOPBAR ===== --}}
    <div class="topbar">
        <a href="/" class="topbar-brand">SUBLY</a>
        <div class="live-clock" id="liveClock">
            <span class="live-dot"></span>
            <span id="clockText">--:--:--</span>
        </div>
        <a href="/" class="btn-kembali">
            <i class="ti ti-arrow-left" style="font-size:14px;"></i> Kembali ke Katalog
        </a>
    </div>

    <div class="main-wrap">

        {{-- ===== PAGE HEADER ===== --}}
        <div class="page-header">
            <div class="page-header-eyebrow">
                <i class="ti ti-receipt" style="font-size:12px;"></i>
                {{ session('status') == 'admin' ? 'Panel Admin' : 'Akun Saya' }}
            </div>
            <h1>{{ session('status') == 'admin' ? 'Kelola Pesanan' : 'Riwayat Pembelian' }}</h1>
            <p>{{ session('status') == 'admin' ? 'Konfirmasi dan proses pesanan dari pelanggan.' : 'Pantau dan kelola status transaksi langganan Anda.' }}</p>
        </div>

        {{-- ===== SUMMARY STATS ===== --}}
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-card-icon" style="background:rgba(56,189,248,0.08);">
                    <i class="ti ti-list-check" style="color:#38bdf8;font-size:18px;"></i>
                </div>
                <div class="stat-card-num">{{ count($proses_transaksi) }}</div>
                <div class="stat-card-label">Total Transaksi</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-icon" style="background:rgba(245,158,11,0.08);">
                    <i class="ti ti-clock" style="color:#fbbf24;font-size:18px;"></i>
                </div>
                <div class="stat-card-num" style="color:#fbbf24;">
                    {{ $proses_transaksi->where('status_pesanan', 'Pending')->count() }}
                </div>
                <div class="stat-card-label">Menunggu Bayar</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-icon" style="background:rgba(16,185,129,0.08);">
                    <i class="ti ti-circle-check" style="color:#34d399;font-size:18px;"></i>
                </div>
                <div class="stat-card-num" style="color:#34d399;">
                    {{ $proses_transaksi->whereIn('status_pesanan', ['Sukses','Berhasil'])->count() }}
                </div>
                <div class="stat-card-label">Transaksi Selesai</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-icon" style="background:rgba(56,189,248,0.08);">
                    <i class="ti ti-coin" style="color:#38bdf8;font-size:18px;"></i>
                </div>
                <div class="stat-card-num">
                    Rp {{ number_format($proses_transaksi->whereIn('status_pesanan', ['Sukses','Berhasil'])->sum('harga'), 0, ',', '.') }}
                </div>
                <div class="stat-card-label">Total Terbayar</div>
            </div>
        </div>

        {{-- ===== TABLE ===== --}}
        <div class="table-scroll-hint d-md-none">
            <i class="ti ti-arrow-left-right" style="font-size:12px;"></i>
            Geser tabel ke samping untuk lihat detail lengkap
        </div>
        <div class="table-section">
            <div class="table-responsive">
                <table class="table table-subly mb-0">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:56px;">No</th>
                            @if(session('status') == 'admin')
                                <th>Pelanggan</th>
                            @endif
                            <th>Layanan</th>
                            <th>Paket</th>
                            <th>Total Bayar</th>
                            <th>Metode</th>
                            <th>Waktu Beli</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proses_transaksi as $index => $t)
                        <tr>
                            <td class="text-center">
                                <div class="row-num">{{ $index + 1 }}</div>
                            </td>

                            @if(session('status') == 'admin')
                            <td>
                                <span class="customer-name">{{ $t->nama_lengkap }}</span>
                                <span class="customer-wa">
                                    <i class="ti ti-brand-whatsapp" style="font-size:12px;"></i>
                                    {{ $t->nomor_whatsapp }}
                                </span>
                            </td>
                            @endif

                            <td>
                                <span class="service-name">{{ $t->nama_layanan }}</span>
                            </td>

                            <td>
                                <span class="badge-paket">
                                    <i class="ti ti-package" style="font-size:11px;"></i>
                                    {{ $t->nama_paket }}
                                </span>
                            </td>

                            <td>
                                <span class="price-text">Rp {{ number_format($t->harga, 0, ',', '.') }}</span>
                            </td>

                            <td>
                                <span class="metode-pill">
                                    @if($t->metode_pembayaran == 'Qris')
                                        <i class="ti ti-qrcode" style="font-size:12px;"></i>
                                    @elseif($t->metode_pembayaran == 'Transfer Bank')
                                        <i class="ti ti-building-bank" style="font-size:12px;"></i>
                                    @else
                                        <i class="ti ti-wallet" style="font-size:12px;"></i>
                                    @endif
                                    {{ $t->metode_pembayaran }}
                                </span>
                            </td>

                            <td>
                                <div class="time-block">
                                    @if($t->created_at)
                                        <span class="time-date">{{ \Carbon\Carbon::parse($t->created_at)->locale('id')->translatedFormat('d M Y') }}</span>
                                        <span class="time-hour">{{ \Carbon\Carbon::parse($t->created_at)->format('H:i') }} WIB</span>
                                    @else
                                        <span style="color:#334155;font-size:12px;">—</span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                @if(session('status') == 'admin')
                                    @if($t->status_pesanan == 'Pending' || $t->status_pesanan == 'Diproses')
                                        <div style="margin-bottom:10px;">
                                            @if($t->status_pesanan == 'Diproses')
                                                <span class="status-badge status-diproses">Perlu Verifikasi</span>
                                            @else
                                                <span class="status-badge status-pending">Menunggu Bayar</span>
                                            @endif
                                        </div>
                                        <div class="action-wrap">
                                            <a href="/transaksi/sukses/{{ $t->id_transaksi }}" class="btn-confirm">
                                                <i class="ti ti-check" style="font-size:12px;"></i> Konfirmasi
                                            </a>
                                            <a href="/transaksi/batal/{{ $t->id_transaksi }}" class="btn-reject">
                                                <i class="ti ti-x" style="font-size:12px;"></i> Tolak
                                            </a>
                                        </div>
                                    @elseif($t->status_pesanan == 'Sukses' || $t->status_pesanan == 'Berhasil')
                                        <span class="status-badge status-sukses">Selesai</span>
                                    @else
                                        <span class="status-badge status-batal">Dibatalkan</span>
                                    @endif

                                @else
                                    @if($t->status_pesanan == 'Pending')
                                        <div style="display:flex;flex-direction:column;gap:8px;">
                                            <span class="status-badge status-pending">Menunggu Bayar</span>
                                            <button onclick="bukaModalBukti('{{ $t->id_transaksi }}', '{{ $t->nama_layanan }}', '{{ $t->nama_paket }}', '{{ $t->harga }}')"
                                                class="btn-kirim-bukti" style="border:none;cursor:pointer;">
                                                <i class="ti ti-upload" style="font-size:12px;"></i> Kirim Bukti
                                            </button>
                                        </div>
                                    @elseif($t->status_pesanan == 'Diproses')
                                        <div>
                                            <span class="status-badge status-diproses" style="margin-bottom:6px;display:inline-flex;">Diverifikasi</span>
                                            <p style="font-size:11px;color:#475569;margin:6px 0 0;">Pengecekan oleh admin</p>
                                        </div>
                                    @elseif($t->status_pesanan == 'Sukses' || $t->status_pesanan == 'Berhasil')
                                        <span class="status-badge status-sukses">
                                            ✓ Pembayaran Sukses
                                        </span>
                                        <p style="font-size:11px;color:#34d399;margin:6px 0 0;opacity:0.7;">Akun siap digunakan</p>
                                    @else
                                        <span class="status-badge status-batal">
                                            ✗ Pembayaran Gagal
                                        </span>
                                        <p style="font-size:11px;color:#f87171;margin:6px 0 0;opacity:0.7;">Hubungi CS kami</p>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ session('status') == 'admin' ? 8 : 7 }}">
                                <div class="empty-state">
                                    <div class="empty-icon">🛒</div>
                                    <h4>Belum ada transaksi</h4>
                                    <p>{{ session('status') == 'admin' ? 'Belum ada pesanan masuk.' : 'Kamu belum pernah melakukan pembelian.' }}</p>
                                    <a href="/" class="btn-kirim-bukti" style="display:inline-flex;width:auto;">
                                        <i class="ti ti-arrow-left" style="font-size:13px;"></i>
                                        Mulai Berlangganan
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- ===== MODAL KIRIM BUKTI PEMBAYARAN ===== --}}
    <div class="modal-bukti-overlay" id="modalBuktiOverlay">
        <div class="modal-bukti">
            <div class="modal-bukti-header">
                <div class="modal-bukti-title">
                    <div class="modal-bukti-title-icon">
                        <i class="ti ti-upload" style="color:#38bdf8;"></i>
                    </div>
                    Kirim Bukti Pembayaran
                </div>
                <div class="modal-close-btn" onclick="tutupModalBukti()">
                    <i class="ti ti-x"></i>
                </div>
            </div>

            <div class="modal-bukti-body">

                {{-- Info Pesanan --}}
                <div class="bukti-info-box">
                    <div>
                        <div class="bukti-info-label">Layanan</div>
                        <div class="bukti-info-val" id="bukti_nama_layanan">—</div>
                        <div style="font-size:11px;color:#475569;margin-top:2px;" id="bukti_nama_paket">—</div>
                    </div>
                    <div class="text-end">
                        <div class="bukti-info-label">Total Bayar</div>
                        <div class="bukti-info-harga" id="bukti_harga">—</div>
                    </div>
                </div>

                {{-- Form Upload --}}
                <form action="/kirim-bukti" method="POST" enctype="multipart/form-data" id="formKirimBukti">
                    @csrf
                    <input type="hidden" name="id_transaksi" id="bukti_id_transaksi">

                    <label class="form-label-bukti">Foto Bukti Transfer</label>

                    {{-- Preview --}}
                    <div class="upload-preview" id="uploadPreview">
                        <span class="upload-preview-label">✓ Foto dipilih</span>
                        <img id="previewImg" src="" alt="Preview">
                    </div>

                    {{-- Upload Area --}}
                    <div class="upload-area" id="uploadArea">
                        <input type="file" name="foto_bukti" id="fotoBuktiInput"
                               accept="image/*" required onchange="previewFoto(this)">
                        <div class="upload-icon">
                            <i class="ti ti-photo-up"></i>
                        </div>
                        <div class="upload-title">Klik atau drag foto bukti transfer</div>
                        <div class="upload-sub">JPG, PNG, WEBP — Maks. 5MB</div>
                    </div>

                    <label class="form-label-bukti">Catatan (Opsional)</label>
                    <textarea class="bukti-catatan" name="catatan" rows="2"
                              placeholder="Contoh: sudah transfer via BCA pukul 15.30..."></textarea>

                    <button type="submit" class="btn-kirim-submit">
                        <i class="ti ti-send" style="font-size:16px;"></i>
                        Kirim Bukti Sekarang
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('/css/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    @include('partials.turbolinks-reinit')
    <script>
        // ===== MODAL BUKTI =====
        function bukaModalBukti(idTransaksi, namaLayanan, namaPaket, harga) {
            document.getElementById('bukti_id_transaksi').value = idTransaksi;
            document.getElementById('bukti_nama_layanan').textContent = namaLayanan;
            document.getElementById('bukti_nama_paket').textContent = namaPaket;
            document.getElementById('bukti_harga').textContent = 'Rp ' + Number(harga).toLocaleString('id-ID');

            // Reset preview
            document.getElementById('uploadPreview').style.display = 'none';
            document.getElementById('uploadArea').style.display = 'block';
            document.getElementById('fotoBuktiInput').value = '';

            document.getElementById('modalBuktiOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function tutupModalBukti() {
            document.getElementById('modalBuktiOverlay').classList.remove('active');
            document.body.style.overflow = '';
        }

        // Tutup modal saat klik overlay
        document.getElementById('modalBuktiOverlay').addEventListener('click', function(e) {
            if (e.target === this) tutupModalBukti();
        });

        // Preview foto
        function previewFoto(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('uploadPreview').style.display = 'block';
                    document.getElementById('uploadArea').style.display = 'none';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // ===== REALTIME CLOCK =====
        function updateClock() {
            const now = new Date();
            const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
            const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'];

            const day = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();

            const hh = String(now.getHours()).padStart(2, '0');
            const mm = String(now.getMinutes()).padStart(2, '0');
            const ss = String(now.getSeconds()).padStart(2, '0');

            document.getElementById('clockText').textContent =
                `${day}, ${date} ${month} ${year} — ${hh}:${mm}:${ss} WIB`;
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>
</html>