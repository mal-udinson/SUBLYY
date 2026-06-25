<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SUBLY | Layanan Premium</title>
<link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    background: #080e1a;
    font-family: 'Poppins', 'Segoe UI', system-ui, sans-serif;
    color: #f1f5f9;
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* ===================== NAVBAR ===================== */
.navbar-subly {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 999;
  background: transparent;
  border-bottom: none;
  padding: 16px 0;
  transition: all 0.4s ease-in-out;
}

.navbar-subly.scrolled {
  top: 16px;
  left: 50%;
  transform: translateX(-50%);
  width: 92%;
  max-width: 1400px;
  background: rgba(8, 14, 26, 0.75);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border-radius: 40px;
  border: 1px solid rgba(56, 189, 248, 0.12);
  padding: 10px 30px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.4);
}

.navbar-subly .navbar-brand {
  font-size: 22px;
  font-weight: 800;
  letter-spacing: -0.5px;
  color: #38bdf8 !important;
  text-decoration: none;
  text-shadow: 0 0 18px rgba(56, 189, 248, 0.6), 0 0 40px rgba(56, 189, 248, 0.25);
  transition: text-shadow 0.3s ease;
}

.navbar-subly .navbar-brand:hover {
  text-shadow: 0 0 24px rgba(56, 189, 248, 0.9), 0 0 60px rgba(56, 189, 248, 0.4);
}

.navbar-subly .nav-link {
  color: #94a3b8 !important;
  font-size: 13px;
  font-weight: 500;
  padding: 6px 16px !important;
  border-radius: 20px;
  transition: all 0.25s ease;
  text-decoration: none;
  letter-spacing: 0.2px;
}

.navbar-subly .nav-link:hover {
  color: #e2e8f0 !important;
  background: rgba(56, 189, 248, 0.08);
}

.navbar-subly .nav-link.active {
  color: #fff !important;
  background: rgba(14, 165, 233, 0.15);
  border: 1px solid rgba(56, 189, 248, 0.3);
  box-shadow: 0 0 12px rgba(56, 189, 248, 0.15);
  font-weight: 600;
}

.search-bar {
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.07) !important;
  color: #fff !important;
  border-radius: 20px;
  padding: 6px 18px;
  font-size: 13px;
  width: 200px;
  transition: all 0.3s ease;
}

.search-bar:focus {
  background: rgba(14, 165, 233, 0.06) !important;
  border-color: rgba(56, 189, 248, 0.45) !important;
  box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1), 0 0 16px rgba(56, 189, 248, 0.08) !important;
  outline: none;
  width: 240px;
}

.search-bar::placeholder { color: #475569; }

.btn-account-nav {
  background: rgba(56, 189, 248, 0.07);
  border: 1px solid rgba(56, 189, 248, 0.2);
  color: #7dd3fc !important;
  font-size: 13px;
  padding: 6px 18px;
  border-radius: 20px;
  font-weight: 500;
  transition: all 0.25s;
  text-decoration: none;
}

.btn-account-nav:hover {
  background: rgba(56, 189, 248, 0.15);
  border-color: rgba(56, 189, 248, 0.4);
  color: #fff !important;
  box-shadow: 0 0 14px rgba(56, 189, 248, 0.2);
}

.btn-admin-nav {
  background: #0ea5e9;
  color: #fff !important;
  font-size: 13px;
  font-weight: 600;
  padding: 6px 16px;
  border-radius: 20px;
  border: none;
  text-decoration: none;
  transition: all 0.2s;
}

.btn-admin-nav:hover {
  background: #0284c7;
  color: #fff !important;
}

/* Dropdown Account */
.dropdown-menu-account {
  background-color: #1e293b !important;
  border: 1px solid #334155 !important;
  border-radius: 12px !important;
  width: 300px;
  margin-top: 12px !important;
  box-shadow: 0 20px 60px rgba(0,0,0,0.6) !important;
}

.dropdown-menu-account .dropdown-item {
  color: #cbd5e1 !important;
  font-size: 13.5px;
  border-radius: 8px;
  transition: all 0.2s;
  padding: 8px 12px;
}

.dropdown-menu-account .dropdown-item:hover {
  background-color: rgba(255,255,255,0.05) !important;
  color: #38bdf8 !important;
  padding-left: 16px;
}

.dropdown-menu-account .dropdown-item.text-danger:hover {
  color: #f87171 !important;
  background-color: rgba(239, 68, 68, 0.08) !important;
}

  /* ===================== CAROUSEL ===================== */
  .carousel-item img {
    height: 480px;
    object-fit: cover;
    filter: brightness(0.7);
  }

  .carousel-item::after {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background:
      linear-gradient(180deg, rgba(8,14,26,0.25) 0%, rgba(8,14,26,0) 25%, rgba(8,14,26,0.15) 70%, rgba(8,14,26,0.85) 100%),
      linear-gradient(to right, rgba(8,14,26,0.96) 0%, rgba(8,14,26,0.55) 45%, rgba(8,14,26,0.05) 80%, rgba(8,14,26,0) 100%);
    pointer-events: none;
  }

  .carousel-caption {
    z-index: 2;
    bottom: auto;
    top: 50%;
    transform: translateY(-50%);
    left: 8%;
    right: auto;
    text-align: left;
    max-width: 520px;
  }

  .carousel-caption h1 {
    font-size: 48px;
    font-weight: 800;
    letter-spacing: -1px;
    line-height: 1.1;
    margin-bottom: 12px;
  }

  .carousel-caption p {
    font-size: 15px;
    color: #94a3b8;
    margin-bottom: 24px;
  }

  .btn-banner {
    background: #0ea5e9;
    border: none;
    color: #fff;
    font-weight: 700;
    padding: 10px 28px;
    border-radius: 30px;
    font-size: 14px;
    box-shadow: 0 0 20px rgba(14,165,233,0.4);
    text-decoration: none;
    transition: all 0.2s;
    display: inline-block;
  }

  .btn-banner:hover {
    background: #0284c7;
    color: #fff;
    box-shadow: 0 0 32px rgba(14,165,233,0.6);
    transform: translateY(-2px);
  }

  .carousel-control-prev,
  .carousel-control-next {
    width: 48px;
    height: 48px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    border: 1px solid rgba(255,255,255,0.1);
    transition: all 0.2s;
  }

  .carousel-control-prev { left: 20px; }
  .carousel-control-next { right: 20px; }

  .carousel-control-prev:hover,
  .carousel-control-next:hover {
    background: rgba(14,165,233,0.3);
    border-color: rgba(56,189,248,0.4);
  }

  .carousel-indicators [data-bs-target] {
    width: 28px;
    height: 3px;
    border-radius: 2px;
    background: rgba(56,189,248,0.25);
    border: none;
    margin: 0 4px;
    transition: all 0.4s ease;
  }

  .carousel-indicators .active {
    background: #38bdf8;
    width: 52px;
  }

  /* ===================== SECTION ===================== */
  .section { padding: 48px 60px 20px; }

  .section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
  }

  .section-title {
    font-size: 20px;
    font-weight: 700;
    letter-spacing: -0.3px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-title::before {
    content: '';
    display: block;
    width: 3px;
    height: 20px;
    background: #0ea5e9;
    border-radius: 2px;
  }

  .see-all-link {
    font-size: 12px;
    color: #38bdf8;
    opacity: 0.7;
    letter-spacing: 0.3px;
    text-decoration: none;
    transition: opacity 0.2s;
  }
  .see-all-link:hover { opacity: 1; color: #38bdf8; }

  /* ===================== CARDS ===================== */
  .cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    padding-bottom: 32px;
  }

  .service-card {
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    position: relative;
    aspect-ratio: 3/2.4;
    display: flex;
    flex-direction: column;
    transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.25s ease;
    border: 1px solid rgba(255,255,255,0.04);
    text-decoration: none;
    background: #1e293b;
  }

  .service-card:hover {
    transform: translateY(-6px) scale(1.02);
    border-color: rgba(56,189,248,0.3);
    box-shadow: 0 20px 40px rgba(0,0,0,0.5), 0 0 0 1px rgba(56,189,248,0.15);
  }

  .card-img-area {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 0;
    position: relative;
  }

  .card-img-area img.card-bg-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0; left: 0;
    transition: transform 0.3s ease;
  }

  .service-card:hover .card-img-area img.card-bg-img {
    transform: scale(1.06);
  }

  .card-info {
    padding: 12px 14px;
    background: rgba(8,14,26,0.9);
    backdrop-filter: blur(4px);
    position: relative;
    z-index: 2;
  }

  .card-name {
    font-size: 13px;
    font-weight: 700;
    color: #f1f5f9;
    margin-bottom: 4px;
  }

  .card-badge {
    display: inline-block;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    color: #38bdf8;
    background: rgba(56,189,248,0.1);
    border: 1px solid rgba(56,189,248,0.2);
    padding: 2px 8px;
    border-radius: 10px;
  }

  .card-badge.green  { color: #34d399; background: rgba(52,211,153,0.1); border-color: rgba(52,211,153,0.2); }
  .card-badge.purple { color: #a78bfa; background: rgba(167,139,250,0.1); border-color: rgba(167,139,250,0.2); }

  /* Admin Buttons on Card */
  .card-admin-actions {
    display: flex;
    gap: 6px;
    padding: 10px 14px 12px;
    background: rgba(8,14,26,0.9);
    border-top: 1px solid rgba(255,255,255,0.06);
    position: relative;
    z-index: 2;
  }

  .btn-card-edit,
  .btn-card-hapus {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 6px 0;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s;
  }

  .btn-card-edit {
    background: rgba(234, 179, 8, 0.1);
    border: 1px solid rgba(234, 179, 8, 0.25);
    color: #facc15;
  }

  .btn-card-edit:hover {
    background: #eab308;
    color: #0f172a;
    border-color: #eab308;
  }

  .btn-card-hapus {
    background: rgba(239, 68, 68, 0.1);
    border: 1px solid rgba(239, 68, 68, 0.25);
    color: #f87171;
  }

  .btn-card-hapus:hover {
    background: #ef4444;
    color: #fff;
    border-color: #ef4444;
  }

  /* ===================== HERO INTRO ===================== */
  .hero-intro {
  padding: 56px 60px 40px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 40px;
  position: relative;
  overflow: hidden;
  background:
    radial-gradient(ellipse at 15% 50%, rgba(14, 165, 233, 0.09) 0%, transparent 55%),
    #080e1a;
}

.hero-intro::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle, rgba(56, 189, 248, 0.18) 1px, transparent 1px);
  background-size: 28px 28px;
  opacity: 0.45;
  pointer-events: none;
  z-index: 0;
}

.hero-intro > * {
  position: relative;
  z-index: 1;
}

  .hero-intro-text { max-width: 620px; }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #38bdf8;
    background: rgba(56,189,248,0.08);
    border: 1px solid rgba(56,189,248,0.25);
    padding: 6px 16px;
    border-radius: 30px;
    margin-bottom: 20px;
  }

  .hero-intro-text h2 {
    font-size: 42px;
    font-weight: 800;
    letter-spacing: -1px;
    line-height: 1.15;
    margin-bottom: 18px;
  }

  .hero-intro-text h2 span { color: #38bdf8; }

  .hero-intro-text p {
    font-size: 14.5px;
    color: #94a3b8;
    line-height: 1.7;
    margin-bottom: 28px;
    max-width: 480px;
  }

  .hero-intro-actions { display: flex; align-items: center; gap: 14px; }

  .btn-hero-primary {
    background: #0ea5e9;
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    padding: 13px 30px;
    border-radius: 30px;
    border: none;
    text-decoration: none;
    box-shadow: 0 0 20px rgba(14,165,233,0.35);
    transition: all 0.2s;
    display: inline-block;
  }

  .btn-hero-primary:hover {
    background: #0284c7;
    color: #fff;
    box-shadow: 0 0 30px rgba(14,165,233,0.55);
    transform: translateY(-2px);
  }

  .btn-hero-secondary {
    color: #cbd5e1;
    font-weight: 600;
    font-size: 14px;
    padding: 13px 22px;
    border-radius: 30px;
    border: 1px solid rgba(255,255,255,0.12);
    text-decoration: none;
    transition: all 0.2s;
    display: inline-block;
  }

  .btn-hero-secondary:hover {
    color: #fff;
    border-color: rgba(56,189,248,0.4);
    background: rgba(255,255,255,0.04);
  }

  /* ===================== PROMO BANNER ===================== */
  .promo-section { padding: 8px 60px 48px; }

  .promo-banner {
    border-radius: 20px;
    background: linear-gradient(130deg, #0c1e3a 0%, #0a1628 50%, #061018 100%);
    border: 1px solid rgba(14,165,233,0.2);
    padding: 32px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
  }

  .promo-glow {
    position: absolute;
    right: -40px;
    top: -40px;
    width: 300px;
    height: 300px;
    background: radial-gradient(ellipse, rgba(14,165,233,0.18) 0%, transparent 65%);
    pointer-events: none;
  }

  .promo-text h3 {
    font-size: 22px;
    font-weight: 800;
    margin-bottom: 8px;
    letter-spacing: -0.3px;
  }

  .promo-text h3 span { color: #38bdf8; }

  .promo-text p {
    font-size: 13px;
    color: #64748b;
    max-width: 340px;
    line-height: 1.6;
    margin: 0;
  }

  .promo-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #0ea5e9;
    color: #fff;
    font-weight: 700;
    font-size: 13px;
    padding: 12px 26px;
    border-radius: 30px;
    text-decoration: none;
    white-space: nowrap;
    box-shadow: 0 0 18px rgba(14,165,233,0.35);
    transition: all 0.2s;
    position: relative;
    z-index: 1;
  }

  .promo-cta:hover {
    background: #0284c7;
    color: #fff;
    box-shadow: 0 0 28px rgba(14,165,233,0.55);
    transform: translateY(-2px);
  }

  /* ===================== FOOTER ===================== */
  .footer {
    border-top: 1px solid rgba(255,255,255,0.05);
    padding: 24px 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 24px;
    color: #334155;
    font-size: 12px;
  }

  .footer a {
    color: #475569;
    text-decoration: none;
    transition: color 0.2s;
  }

  .footer a:hover { color: #38bdf8; }

  /* ===================== CS BUTTON ===================== */
  .btn-cs-main {
    background: linear-gradient(135deg, #0ea5e9, #0284c7);
    color: white !important;
    border: none;
    padding: 12px 24px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 16px rgba(14, 165, 233, 0.4);
    transition: all 0.3s ease;
  }

  .btn-cs-main:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(14, 165, 233, 0.6);
    background: linear-gradient(135deg, #38bdf8, #0ea5e9);
  }

  .btn-cs-main::after { display: none; }

  .dropdown-menu-cs {
    background-color: #1e293b !important;
    border: 1px solid rgba(255,255,255,0.05) !important;
    border-radius: 12px !important;
    width: 280px;
  }

  .dropdown-menu-cs .dropdown-item {
    color: #cbd5e1 !important;
    font-size: 13.5px;
    border-radius: 8px;
    transition: all 0.2s;
    padding: 8px 12px;
  }

  .dropdown-menu-cs .dropdown-item:hover {
    background-color: rgba(255,255,255,0.05) !important;
    color: #38bdf8 !important;
    padding-left: 16px;
  }

  /* ===================== CURVE DIVIDER ===================== */
  .section-curve-divider {
    width: 100%;
    line-height: 0;
    overflow: hidden;
    margin: 0;
    padding: 0;
  }
  .section-curve-divider svg {
    display: block;
    width: 100%;
    height: 56px;
  }

  /* ===================== RESPONSIVE ===================== */
  @media (max-width: 992px) {
    .carousel-caption h1 { font-size: 32px; }
    .carousel-item img { height: 340px; }
    .section { padding: 32px 24px 16px; }
    .cards-grid { grid-template-columns: repeat(2, 1fr); }
    .stats-bar { padding: 16px 24px; gap: 8px; flex-wrap: wrap; }
    .promo-banner { flex-direction: column; gap: 20px; text-align: center; }
    .promo-text p { max-width: 100%; }
    .promo-section { padding: 8px 24px 32px; }
    .footer { padding: 20px 24px; flex-direction: column; gap: 8px; text-align: center; }
    .navbar-subly.scrolled { width: 95%; top: 10px; padding: 8px 20px; }
    .hero-intro { flex-direction: column; padding: 40px 24px; text-align: center; }
    .hero-intro-text { max-width: 100%; }
    .hero-intro-text p { max-width: 100%; margin-left: auto; margin-right: auto; }
    .hero-intro-text h2 { font-size: 32px; }
    .hero-intro-actions { justify-content: center; }
  }

  @media (max-width: 576px) {
    .cards-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .carousel-caption h1 { font-size: 24px; }
    .stat-num { font-size: 18px; }
  }

  /* Container Utama Search Box - Disesuaikan agar kompak seperti semula */
.subly-search-box {
    position: relative;
    display: flex;
    align-items: center;
    width: 160px; /* Diperkecil dari 240px ke 160px agar tidak mendorong elemen kanan */
    transition: width 0.3s ease; /* Efek transisi halus */
}

/* Biar keren: Pas di-klik (focus), search bar melebar sedikit secara otomatis */
.subly-search-box:focus-within {
    width: 200px; 
}

/* Mengatur Posisi Ikon Kaca Pembesar */
.subly-search-box .search-icon {
    position: absolute;
    left: 14px; 
    color: #6C7A9C; 
    font-size: 0.9rem;
    pointer-events: none; 
    transition: color 0.3s ease;
}

/* Mengatur Kotak Inputan */
.subly-search-box .search-input {
    width: 100%;
    padding: 7px 14px 7px 36px; /* Padding disesuaikan dengan ukuran baru */
    font-size: 0.82rem;
    color: #ffffff;
    background-color: #0d121f; 
    border: 1px solid rgba(255, 255, 255, 0.08); 
    border-radius: 50px; 
    outline: none;
    transition: all 0.3s ease;
}

/* Efek teks placeholder */
.subly-search-box .search-input::placeholder {
    color: #58667e;
}

/* Efek Interaktif Saat Search Bar di-Klik (Focus) */
.subly-search-box .search-input:focus {
    border-color: #00A3FF; 
    background-color: #121826; 
    box-shadow: 0 0 12px rgba(0, 163, 255, 0.15); 
}

.subly-search-box .search-input:focus ~ .search-icon {
    color: #00A3FF;
}
</style>
</head>
<body>

{{-- ===================== NAVBAR ===================== --}}
<nav class="navbar navbar-expand-lg navbar-subly" id="mainNavbar">
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="/">SUBLY</a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      style="color:#94a3b8;">
      <i class="bi bi-list fs-4"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link active" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#streaming">Streaming & Music</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#aitools">AI Tools</a>
        </li>
        @if(session()->get('status') == 'admin')
        <li class="nav-item ms-2">
          <a href="/tambah" class="btn-admin-nav">+ Tambah Produk</a>
        </li>
        @endif
      </ul>

      <div class="d-flex align-items-center gap-3 me-lg-4">
    {{-- Search --}}
    <form action="/cari" method="GET" class="d-none d-lg-block m-0">
        <div class="subly-search-box">
            <i class="bi bi-search search-icon"></i>
            <input type="text" name="cari" class="search-input"
                   placeholder="Cari aplikasi..." value="{{ old('cari') }}">
        </div>
    </form>
    
</div>

        {{-- Account Dropdown --}}
        <div class="dropdown">
          <a class="btn-account-nav dropdown-toggle d-flex align-items-center gap-2"
            href="#" role="button" data-bs-toggle="dropdown">
            @if(session()->has('username'))
              <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-info text-dark fw-bold"
                style="width:26px;height:26px;font-size:11px;">
                {{ strtoupper(substr(session('username'), 0, 1)) }}
              </span>
              {{ session('username') }}
            @else
              <i class="bi bi-person-circle"></i> Account
            @endif
          </a>

          <ul class="dropdown-menu dropdown-menu-account dropdown-menu-end p-2 shadow-lg">
            @if(session()->has('username'))
              <li>
                <div class="d-flex align-items-center mb-2 p-2 rounded" style="background-color:#0f172a;">
                  <div class="bg-info text-dark fw-bold rounded-circle d-flex justify-content-center align-items-center me-3"
                    style="width:42px;height:42px;font-size:16px;flex-shrink:0;">
                    {{ strtoupper(substr(session('username'), 0, 1)) }}
                  </div>
                  <div>
                    <strong class="d-block text-white" style="font-size:14px;">{{ session('username') }}</strong>
                    <small class="text-info text-uppercase" style="font-size:10px;">Akun {{ session('status') }}</small>
                  </div>
                </div>
              </li>
              <li><a class="dropdown-item py-2 rounded" href="/transaksi">
                <i class="bi bi-receipt me-2 opacity-50"></i>Riwayat Transaksi
              </a></li>
              <li><hr class="dropdown-divider border-secondary my-1"></li>
              <li><a class="dropdown-item text-danger py-2 rounded" href="/logout">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
              </a></li>
            @else
              <li>
                <div class="d-flex align-items-center mb-2 p-2 rounded" style="background-color:#0f172a;">
                  <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center me-3 text-white"
                    style="width:42px;height:42px;font-size:18px;flex-shrink:0;">
                    <i class="bi bi-person"></i>
                  </div>
                  <div>
                    <strong class="d-block text-white" style="font-size:14px;">Guest Account</strong>
                    <small class="text-secondary" style="font-size:11px;">Masuk untuk bertransaksi</small>
                  </div>
                </div>
              </li>
              <li class="d-flex gap-2 mb-2 px-1">
                <a href="/halaman-login" class="btn btn-outline-light w-50 py-1" style="border-radius:8px;font-size:13px;">Login</a>
                <a href="/signin" class="btn btn-info text-dark fw-bold w-50 py-1" style="border-radius:8px;font-size:13px;">Daftar</a>
              </li>
              <li><hr class="dropdown-divider border-secondary my-1"></li>
              <li><a class="dropdown-item py-2 rounded" href="/syarat-ketentuan">
                <i class="bi bi-file-text me-2 opacity-50"></i>Syarat & Ketentuan
              </a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

{{-- ===================== CAROUSEL ===================== --}}
<div id="bannerPromo" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" style="padding-top:72px;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#bannerPromo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#bannerPromo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#bannerPromo" data-bs-slide-to="2"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.hdqwalls.com/download/netflix-squid-game-season-3-os-1366x768.jpg" class="d-block w-100" alt="Netflix Promo">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="text-white">NETFLIX PRO</h1>
        <p>Streaming film 4K di semua perangkat.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="https://awsimages.detik.net.id/community/media/visual/2023/12/21/ilustrasi-ai_169.jpeg?w=700&q=90" class="d-block w-100" alt="AI Tools Promo">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="text-white">AI PRO TOOLS</h1>
        <p>Kecerdasan buatan untuk masa depan.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="https://ichef.bbci.co.uk/ace/ws/800/cpsprodpb/3970/production/_108240741_beatles-abbeyroad-square-reuters-applecorps.jpg.webp" class="d-block w-100" alt="Spotify Promo">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="text-white">SPOTIFY PREMIUM</h1>
        <p>Musik tanpa batas, tanpa iklan.</p>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#bannerPromo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#bannerPromo" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

{{-- ===================== HERO INTRO ===================== --}}
<section class="hero-intro">
  <div class="hero-intro-text">
    <span class="hero-badge">✦ PLATFORM LANGGANAN #1</span>
    <h2>Semua Premium<br><span>Satu Tempat</span></h2>
    <p>Langganan Netflix, Spotify, ChatGPT, dan 20+ layanan premium lainnya dengan harga terjangkau dan garansi penuh.</p>
    <div class="hero-intro-actions">
      <a href="#streaming" class="btn-hero-primary">Mulai Berlangganan</a>
      <a href="#aitools" class="btn-hero-secondary">Lihat Semua →</a>
    </div>
  </div>
</section>

{{-- ===================== CURVE DIVIDER ===================== --}}
<div class="section-curve-divider">
  <svg viewBox="0 0 1400 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <defs>
      <filter id="blueGlow" x="-20%" y="-100%" width="140%" height="300%">
        <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur"/>
        <feMerge>
          <feMergeNode in="blur"/>
          <feMergeNode in="SourceGraphic"/>
        </feMerge>
      </filter>
    </defs>
    <path d="M-20,52 Q700,4 1420,52"
      stroke="#38bdf8"
      stroke-width="1.8"
      fill="none"
      filter="url(#blueGlow)"
      opacity="0.75"/>
  </svg>
</div>

{{-- ===================== STREAMING & MUSIC ===================== --}}
<section class="section" id="streaming">
  <div class="section-header">
    <div class="section-title">Streaming & Music</div>
    <a href="#streaming" class="see-all-link">Lihat semua →</a>
  </div>
  <div class="cards-grid">
    @foreach($layanan as $l)
      @if($l->kategori == 'Streaming & Movies' || $l->kategori == 'Music & Audio')
      <a href="/detailLayanan/{{ $l->id_layanan }}" class="service-card">

        <div class="card-img-area">
            <img src="{{ asset('storage/' . $l->gambar_logo) }}" alt="{{ $l->nama_layanan }}" class="card-bg-img">
        </div>
        <div class="card-info">
          <div class="card-name">{{ $l->nama_layanan }}</div>
          @if($l->kategori == 'Music & Audio')
            <span class="card-badge green">{{ $l->kategori }}</span>
          @else
            <span class="card-badge">{{ $l->kategori }}</span>
          @endif
        </div>

        @if(session()->get('status') == 'admin')
        <div class="card-admin-actions">
          <button type="button" class="btn-card-edit"
            onclick="event.preventDefault(); event.stopPropagation(); window.location='/show/{{ $l->id_layanan }}'">
            <i class="ti ti-edit"></i> Edit
          </button>
          <button type="button" class="btn-card-hapus"
            onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Hapus {{ $l->nama_layanan }}?')) window.location='/hapus/{{ $l->id_layanan }}'">
            <i class="ti ti-trash"></i> Hapus
          </button>
        </div>
        @endif

      </a>
      @endif
    @endforeach
  </div>
</section>

{{-- ===================== AI TOOLS ===================== --}}
<section class="section" id="aitools" style="padding-top:0;">
  <div class="section-header">
    <div class="section-title">AI Tools & Productivity</div>
    <a href="#aitools" class="see-all-link">Lihat semua →</a>
  </div>
  <div class="cards-grid">
    @foreach($layanan as $l)
      @if($l->kategori == 'AI & Productivity')
      <a href="/detailLayanan/{{ $l->id_layanan }}" class="service-card">

        <div class="card-img-area">
            <img src="{{ asset('storage/' . $l->gambar_logo) }}" alt="{{ $l->nama_layanan }}" class="card-bg-img">
        </div>
        <div class="card-info">
          <div class="card-name">{{ $l->nama_layanan }}</div>
          <span class="card-badge purple">{{ $l->kategori }}</span>
        </div>

        @if(session()->get('status') == 'admin')
        <div class="card-admin-actions">
          <button type="button" class="btn-card-edit"
            onclick="event.preventDefault(); event.stopPropagation(); window.location='/show/{{ $l->id_layanan }}'">
            <i class="ti ti-edit"></i> Edit
          </button>
          <button type="button" class="btn-card-hapus"
            onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Hapus {{ $l->nama_layanan }}?')) window.location='/hapus/{{ $l->id_layanan }}'">
            <i class="ti ti-trash"></i> Hapus
          </button>
        </div>
        @endif

      </a>
      @endif
    @endforeach
  </div>
</section>

{{-- ===================== PROMO BANNER ===================== --}}
<div class="promo-section">
  <div class="promo-banner">
    <div class="promo-glow"></div>
    <div class="promo-text">
      <h3>Harga terjangkau, <span>garansi penuh</span></h3>
      <p>Semua akun premium kami bergaransi penuh sesuai durasi paket. Bermasalah? Kami ganti dalam 1×24 jam.</p>
    </div>
    <a href="https://wa.me/6281212659364" target="_blank" class="promo-cta">
      <i class="ti ti-headset"></i> Tanya Dulu
    </a>
  </div>
</div>

{{-- ===================== FOOTER ===================== --}}
<footer class="footer">
  <span>© 2026 SUBLY. All rights reserved.</span>
  <a href="/syarat-ketentuan">Syarat & Ketentuan</a>
</footer>

{{-- CS BUTTON — posisi kanan bawah --}}
<div class="btn-group dropup position-fixed" style="bottom:28px;right:28px;z-index:1050;">
  <button type="button" class="btn btn-cs-main dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-headset me-2"></i> Hubungi CS
  </button>
  <ul class="dropdown-menu dropdown-menu-cs dropdown-menu-end shadow-lg p-2 mb-2">
    <li class="px-2 py-1">
      <span class="text-secondary fw-bold" style="font-size:11px;text-transform:uppercase;letter-spacing:1px;">Hubungi Customer Service</span>
    </li>
    <li><hr class="dropdown-divider border-secondary my-1"></li>
    <li><a class="dropdown-item py-2 rounded" href="https://wa.me/6281212659364" target="_blank">
      <i class="bi bi-whatsapp text-success me-2"></i> Chat WhatsApp
    </a></li>
    <li><a class="dropdown-item py-2 rounded" href="https://instagram.com/" target="_blank">
      <i class="bi bi-instagram text-danger me-2"></i> Chat Instagram
    </a></li>
    <li><hr class="dropdown-divider border-secondary my-1"></li>
    <li class="px-2 py-1">
      <span class="text-secondary" style="font-size:11px;">Komunitas & Info</span>
    </li>
    <li><a class="dropdown-item py-2 rounded" href="https://youtube.com/" target="_blank">
      <i class="bi bi-youtube text-danger me-2"></i> Youtube Channel
    </a></li>
  </ul>
</div>

<script src="{{ asset('/css/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById('mainNavbar');
    
    // Yang lama (jangan diubah)
    window.addEventListener('scroll', function () {
      if (window.scrollY > 60) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    // ← TAMBAH DI SINI (setelah }); di atas)
    const navLinks = document.querySelectorAll('.navbar-subly .nav-link');

    function updateActiveNav() {
      const scrollY = window.scrollY;

      if (scrollY < 300) {
        navLinks.forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('href') === '/') link.classList.add('active');
        });
        return;
      }

      const streamingEl = document.getElementById('streaming');
      const aitoolsEl  = document.getElementById('aitools');

      let activeHref = '/';

      if (streamingEl && scrollY >= streamingEl.offsetTop - 120) {
        activeHref = '#streaming';
      }
      if (aitoolsEl && scrollY >= aitoolsEl.offsetTop - 120) {
        activeHref = '#aitools';
      }

      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === activeHref) {
          link.classList.add('active');
        }
      });
    }

    window.addEventListener('scroll', updateActiveNav);
    updateActiveNav();

  }); 
</script>
</body>
</html>