<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <style>
        body {
            background-color: #0f172a;
            font-family: 'Poppins', sans-serif;
            color: #f8fafc;
            background-image: radial-gradient(circle at top right, #1e293b, #0f172a);
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .form-control, .form-select {
            background-color: rgba(15, 23, 42, 0.8);
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

    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-5 glass-card p-4">
            <div>
                <h3 class="fw-bold mb-0">Selamat Datang, <span class="text-info">{{ session('username') }}</span>!</h3>
                <p class="text-secondary mb-0 mt-1" style="font-size: 13px;">
                    Status Akun: <span class="badge bg-dark border border-secondary text-info text-uppercase px-3 py-1 rounded-pill">{{ session('status') }}</span>
                </p>
            </div>
            <div>
                <a href="/" class="btn btn-outline-info rounded-pill px-4 shadow-sm">
                    Kembali ke Katalog
                </a>
            </div>
        </div>

        @if (session()->get('status') == 'admin')
        <div class="glass-card p-4 p-md-5 mb-5">
            <h4 class="fw-bold mb-4 border-bottom border-secondary pb-3">Tambah Layanan Baru</h4>
            
            <form action="/tambah" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-secondary small">Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: Disney+ Hotstar" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-secondary small">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="Streaming & Movies">Streaming & Movies</option>
                            <option value="Music & Audio">Music & Audio</option>
                            <option value="AI & Productivity">AI & Productivity</option>
                            <option value="Gaming">Gaming</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label text-secondary small">Upload Logo Layanan</label>
                        <input type="file" name="gambar_logo" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info text-white fw-bold rounded-pill px-5 py-2 shadow">Simpan Data Layanan</button>
            </form>
        </div>

        @else
        <div class="glass-card p-4 p-md-5 mb-5 text-center">
            <h4 class="fw-bold mb-3">Dashboard Pembeli</h4>
            <p class="text-secondary mb-4">Pantau seluruh status pesanan dan layanan langganan aktif Anda di satu tempat.</p>
            
            <a href="/transaksi" class="btn btn-info text-white fw-bold rounded-pill px-5 py-3 shadow">
                Lihat Riwayat Transaksi Saya
            </a>
            
            <div class="d-flex justify-content-between align-items-center mt-5 pt-3 border-top border-secondary">
                <a href="#" class="text-secondary small text-decoration-none">📄 Syarat & Ketentuan Layanan</a>
                <span class="text-secondary small">© 2026 SUBLY. All rights reserved.</span>
            </div>
        </div>
        @endif

    </div>

</body>
</html>