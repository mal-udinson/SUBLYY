<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <style>
        body {
            background-color: #0f172a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f8fafc;
            background-image: radial-gradient(circle at top right, #1e293b, #0f172a);
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.6);
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

        .table-glass {
            color: #e2e8f0;
        }
        
        .table-glass th {
            border-bottom: 2px solid #334155;
            color: #94a3b8;
            font-weight: 600;
        }
        
        .table-glass td {
            border-bottom: 1px solid #1e293b;
            vertical-align: middle;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-5 glass-card p-4">
            <div>
                <h3 class="fw-bold mb-0">Selamat Datang, <span class="text-info">{{ session('username') }}</span>!</h3>
                <p class="text-secondary mb-0 mt-1">Status Akun: <span class="badge bg-secondary text-uppercase">{{ session('status') }}</span></p>
            </div>
            <div class="d-flex gap-3">
                <a href="/tabel" class="btn btn-outline-info rounded-pill px-4">Lihat Katalog</a>
                <a href="/logout" class="btn btn-danger rounded-pill px-4 shadow-sm">Logout</a>
            </div>
        </div>

        @if (session()->get('status') == 'admin')
        <div class="glass-card p-4 p-md-5 mb-5">
            <h4 class="fw-bold mb-4 border-bottom border-secondary pb-3">Tambah Layanan Baru</h4>
            
            <form action="/tambah" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-secondary">Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: Disney+ Hotstar" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-secondary">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="Streaming & Movies">Streaming & Movies</option>
                            <option value="Music & Audio">Music & Audio</option>
                            <option value="AI & Productivity">AI & Productivity</option>
                            <option value="Gaming">Gaming</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label text-secondary">Upload Logo Layanan</label>
                        <input type="file" name="gambar_logo" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info text-white fw-bold rounded-pill px-5 py-2">Simpan Data Layanan</button>
            </form>
        </div>

        @else
        <div class="glass-card p-4 p-md-5">
            <h4 class="fw-bold mb-4 border-bottom border-secondary pb-3">Riwayat Transaksi Anda</h4>
            
            <div class="table-responsive">
                <table class="table table-glass table-hover border-0">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Nama Lengkap</th>
                            <th>Metode Bayar</th>
                            <th>Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksi as $t)
                        <tr>
                            <td class="fw-bold text-info">#TRX-{{ $t->id_transaksi }}</td>
                            <td>{{ $t->nama_lengkap }}</td>
                            <td><span class="badge bg-secondary">{{ $t->metode_pembayaran }}</span></td>
                            <td>
                                @if($t->status_pesanan == 'Pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @else
                                    <span class="badge bg-success">Berhasil</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-secondary">Belum ada transaksi pembelian.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>

</body>
</html>