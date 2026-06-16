<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Layanan Premium</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #0f172a; 
            font-family: 'Poppins', sans-serif;
            background-image: radial-gradient(circle at top right, #1e293b, #0f172a);
        }
        
        /* Styling Navbar Custom */
        .navbar-subly {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 15px 0;
        }
        
        .nav-link {
            color: #94a3b8 !important;
            font-size: 14px;
            font-weight: 400;
            margin: 0 12px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            color: #0ea5e9 !important;
            transform: translateY(-2px);
        }
        
        .search-bar {
            background-color: rgba(30, 41, 59, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            width: 260px;
            font-size: 13px;
            transition: all 0.3s ease;
        }
        
        .search-bar:focus {
            background-color: rgba(30, 41, 59, 0.9);
            color: white;
            border-color: #0ea5e9;
            box-shadow: 0 0 15px rgba(14, 165, 233, 0.3);
        }

        /* Styling Card Layanan bergaya Glassmorphism */
        .img-layanan {
            width: 100%;
            height: 220px; 
            object-fit: cover;
            border-radius: 20px 20px 0 0; 
        }

        .card-subly {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
        }

        .card-subly:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            border-color: rgba(14, 165, 233, 0.4);
        }

        /* Modifikasi Badge Kategori */
        .badge-kategori {
            background: rgba(255, 255, 255, 0.05);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.3);
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        /* Efek Gradasi pada Banner agar teks mudah dibaca */
        .carousel-item::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.1) 100%);
            pointer-events: none;
        }
        
        .carousel-caption {
            z-index: 2;
        }
        
        /* Modifikasi Tombol Banner */
        .btn-banner {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-banner:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(14, 165, 233, 0.4);
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-subly sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-info fs-4" href="/">SUBLY</a>
            
            <button class="navbar-toggler bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#streaming">Streaming & Music</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aitools">AI Tools</a>
                    </li>
                    <li class="nav-item mx-3">
                        <input type="text" class="search-bar form-control form-control-sm" placeholder="🔍 Cari aplikasi...">
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-2" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown">
                            Account
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end p-3 shadow-lg" style="width: 300px; background-color: #1e293b; border: 1px solid #334155; border-radius: 12px; margin-top: 15px;">
                            
                            @if(session()->has('username'))
                                <li>
                                    <div class="d-flex align-items-center mb-3 p-2 rounded" style="background-color: #0f172a;">
                                        <div class="bg-info text-dark fw-bold rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 45px; height: 45px; font-size: 18px;">
                                            {{ strtoupper(substr(session('username'), 0, 1)) }}
                                        </div>
                                        <div>
                                            <strong class="d-block text-white">{{ session('username') }}</strong>
                                            <small class="text-info text-uppercase" style="font-size: 11px;">Akun {{ session('status') }}</small>
                                        </div>
                                    </div>
                                </li>
                                <li><a class="dropdown-item text-light py-2 rounded" href="/home">Riwayat Transaksi</a></li>
                                <li><hr class="dropdown-divider border-secondary my-2"></li>
                                <li><a class="dropdown-item text-danger py-2 rounded" href="/logout">Logout</a></li>
                            
                            @else
                                <li>
                                    <div class="d-flex align-items-center mb-3 p-2 rounded" style="background-color: #0f172a;">
                                        <div class="bg-light text-dark rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 45px; height: 45px; font-size: 20px;">
                                            👤
                                        </div>
                                        <div>
                                            <strong class="d-block text-white">Guest Account</strong>
                                            <small class="text-secondary" style="font-size: 12px;">Masuk untuk transaksi layanan</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex gap-2 mb-3">
                                    <a href="/halaman-login" class="btn btn-outline-light w-50 py-2" style="border-radius: 8px; font-size: 14px;">Login</a>
                                    <a href="/signin" class="btn btn-info text-dark fw-bold w-50 py-2" style="border-radius: 8px; font-size: 14px;">Sign In</a>
                                </li>
                                <li><hr class="dropdown-divider border-secondary my-2"></li>
                                <li>
                                    <a class="dropdown-item text-secondary py-2 rounded d-flex align-items-center gap-2" href="/halaman-login">
                                        🕒 Riwayat Transaksi
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-secondary py-2 rounded d-flex align-items-center gap-2" href="#">
                                        💬 Feedback
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="bannerPromo" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerPromo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#bannerPromo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#bannerPromo" data-bs-slide-to="2"></button>
        </div>
        
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/banner_netflix.png') }}" class="d-block w-100" style="height: 450px; object-fit: cover;" alt="Netflix Promo">
                <div class="carousel-caption d-none d-md-block text-start" style="bottom: 25%; left: 10%;">
                    <h1 class="fw-bold display-4 text-white">NETFLIX PRO</h1>
                    <p class="fs-5 text-light mb-4">Streaming film 4K di semua perangkat.</p>
                    <a href="#streaming" class="btn btn-info px-4 py-2 rounded-pill fw-bold text-white shadow">Langganan</a>
                </div>
            </div>
            
            <div class="carousel-item">
                <img src="{{ asset('storage/banner_ai.png') }}" class="d-block w-100" style="height: 450px; object-fit: cover;" alt="AI Promo">
                <div class="carousel-caption d-none d-md-block text-start" style="bottom: 25%; left: 10%;">
                    <h1 class="fw-bold display-4 text-white">AI PRO TOOLS</h1>
                    <p class="fs-5 text-light mb-4">Kecerdasan buatan untuk masa depan.</p>
                    <a href="#aitools" class="btn btn-info px-4 py-2 rounded-pill fw-bold text-white shadow">Langganan</a>
                </div>
            </div>
            
            <div class="carousel-item">
                <img src="{{ asset('storage/banner_spotify.png') }}" class="d-block w-100" style="height: 450px; object-fit: cover;" alt="Spotify Promo">
                <div class="carousel-caption d-none d-md-block text-start" style="bottom: 25%; left: 10%;">
                    <h1 class="fw-bold display-4 text-white">SPOTIFY PREMIUM</h1>
                    <p class="fs-5 text-light mb-4">Musik tanpa batas, tanpa iklan.</p>
                    <a href="#streaming" class="btn btn-info px-4 py-2 rounded-pill fw-bold text-white shadow">Langganan</a>
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

    <div class="container mt-5 pt-4" id="streaming">
        <h3 class="text-white fw-bold mb-4 border-bottom border-secondary pb-2">Streaming & Music</h3>
        
        <div class="row">
            @foreach($layanan as $l)
                @if($l->kategori == 'Streaming & Movies' || $l->kategori == 'Music & Audio')
                <div class="col-md-3 mb-4">
                    <div class="card card-subly h-100 shadow">
                        <img src="{{ asset('storage/' . $l->gambar_logo) }}" class="img-layanan" alt="Logo Layanan">
                        <div class="card-body text-center text-white d-flex flex-column justify-content-center py-4">
                            <h4 class="card-title fw-bold m-0">{{ $l->nama_layanan }}</h4>
                            <span class="badge bg-secondary mt-2 w-auto mx-auto px-3 py-2 rounded-pill">{{ $l->kategori }}</span>
                        </div>
                        <a href="/detail/{{ $l->id_layanan }}" class="stretched-link"></a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container mt-5 pt-4 mb-5" id="aitools">
        <h3 class="text-white fw-bold mb-4 border-bottom border-secondary pb-2">AI Tools & Productivity</h3>
        
        <div class="row">
            @foreach($layanan as $l)
                @if($l->kategori == 'AI & Productivity')
                <div class="col-md-3 mb-4">
                    <div class="card card-subly h-100 shadow">
                        <img src="{{ asset('storage/' . $l->gambar_logo) }}" class="img-layanan" alt="Logo Layanan">
                        <div class="card-body text-center text-white d-flex flex-column justify-content-center py-4">
                            <h4 class="card-title fw-bold m-0">{{ $l->nama_layanan }}</h4>
                            <span class="badge bg-secondary mt-2 w-auto mx-auto px-3 py-2 rounded-pill">{{ $l->kategori }}</span>
                        </div>
                        <a href="/detail/{{ $l->id_layanan }}" class="stretched-link"></a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    <script src="{{ asset('/css/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>