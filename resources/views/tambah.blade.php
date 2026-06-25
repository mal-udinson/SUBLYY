<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>SUBLY Admin - Tambah Layanan</title>
    <style>
        body { 
            background-color: #0f172a; 
            color: #ffffff; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Mengikuti warna card utama SUBLY */
        .card-custom { 
            background-color: #1e293b; 
            border: none; 
            border-radius: 16px; 
        }
        .card-header {
            background-color: transparent;
        }
        /* Mengikuti gaya input text di modal detail pembayaran */
        .form-label {
            color: #94a3b8; /* Abu-abu terang agar teks label terbaca jelas */
            font-size: 0.95rem;
            margin-bottom: 8px;
        }
        .form-control, .form-select { 
            background-color: #0f172a; 
            border: 1px solid #334155; 
            color: #ffffff; 
            padding: 12px 16px;
            border-radius: 8px;
        }
        .form-control:focus, .form-select:focus { 
            background-color: #0f172a; 
            color: #ffffff; 
            border-color: #00aeef; /* Border cyan saat fokus */
            box-shadow: 0 0 0 0.25rem rgba(0, 174, 239, 0.25);
        }
        /* Placeholder agar tidak terlalu gelap */
        .form-control::placeholder {
            color: #475569;
        }
        /* Tombol Batal Transparan Keren */
        .btn-batal {
            background-color: transparent;
            border: 1px solid #475569;
            color: #94a3b8;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.2s;
        }
        .btn-batal:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            border-color: #94a3b8;
        }
        /* Tombol Simpan Cyan Premium seperti tombol Bayar Sekarang */
        .btn-simpan {
            background-color: #00aeef;
            color: #ffffff;
            border: none;
            padding: 10px 32px;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.2s;
        }
        .btn-simpan:hover {
            background-color: #009cd6;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 174, 239, 0.3);
        }
        /* Kustomisasi input file upload */
        .form-control[type=file]::file-selector-button {
            background-color: #334155;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 4px 12px;
            margin-right: 12px;
            transition: all 0.2s;
        }
        .form-control[type=file]::file-selector-button:hover {
            background-color: #475569;
        }
    </style>
</head>
<body>
    <div class="container py-5 mt-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card card-custom shadow-lg p-3">
                    <div class="card-header border-0 pt-3 pb-2">
                        <h4 class="fw-bold m-0 text-white">Tambah Produk Layanan Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="/tambah" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Nama Layanan</label>
                                <input type="text" name="nama_layanan" class="form-control" placeholder="Masukkan nama layanan (Contoh: Spotify Premium)" required autocomplete="off">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select name="kategori" class="form-select" required>
                                    <option value="" disabled selected hidden>Pilih Kategori...</option>
                                    <option value="Streaming & Movies">Streaming & Movies</option>
                                    <option value="Music & Audio">Music & Audio</option>
                                    <option value="AI & Productivity">AI & Productivity</option>
                                </select>
                            </div>

                            <div class="mb-5">
                                <label class="form-label fw-semibold">Logo / Gambar Layanan</label>
                                <input type="file" name="gambar_logo" accept="image/*" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-end gap-3 pb-2">
                                <a href="/" class="btn btn-batal text-decoration-none d-flex align-items-center">Batal</a>
                                <button type="submit" class="btn btn-simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>