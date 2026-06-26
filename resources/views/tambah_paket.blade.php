<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SUBLY | Tambah Paket</title>
<link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    background: #080e1a;
    font-family: 'Poppins', sans-serif;
    color: #f1f5f9;
    min-height: 100vh;
  }
  .edit-page-wrapper {
    padding: 60px 24px 80px;
    min-height: 100vh;
    background:
      radial-gradient(ellipse at 10% 0%, rgba(14,165,233,0.16) 0%, transparent 50%),
      radial-gradient(circle, rgba(56,189,248,0.18) 1.2px, transparent 1.2px) 0 0/28px 28px,
      #080e1a;
  }
  .card-custom {
    background: linear-gradient(160deg, rgba(30,41,59,0.6) 0%, rgba(15,23,42,0.4) 100%);
    border: 1px solid rgba(56,189,248,0.12);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.45);
    overflow: hidden;
  }
  .card-custom .card-header {
    background: rgba(8,14,26,0.4);
    border-bottom: 1px solid rgba(56,189,248,0.12) !important;
    padding: 28px 32px !important;
  }
  .card-custom .card-header h4 {
    font-size: 20px;
    font-weight: 800;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .card-custom .card-header h4::before {
    content: '';
    display: block;
    width: 3px;
    height: 20px;
    background: #0ea5e9;
    border-radius: 2px;
  }
  .card-custom .card-body { padding: 32px !important; }
  .form-label {
    font-size: 13px;
    font-weight: 600;
    color: #cbd5e1;
    margin-bottom: 8px;
  }
  .form-control {
    background-color: rgba(255,255,255,0.04) !important;
    border: 1px solid rgba(255,255,255,0.08) !important;
    color: #f1f5f9 !important;
    border-radius: 12px;
    padding: 11px 16px;
    font-size: 14px;
    transition: all 0.25s ease;
  }
  .form-control::placeholder { color: #475569; }
  .form-control:focus {
    background-color: rgba(14,165,233,0.06) !important;
    border-color: rgba(56,189,248,0.45) !important;
    box-shadow: 0 0 0 3px rgba(56,189,248,0.1) !important;
    color: #fff !important;
  }
  textarea.form-control { resize: none; }
  .price-prefix-group { position: relative; }
  .price-prefix-group .price-prefix {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #38bdf8;
    font-weight: 600;
    font-size: 14px;
    pointer-events: none;
  }
  .price-prefix-group input { padding-left: 38px; }
  hr { border-color: rgba(56,189,248,0.12) !important; opacity: 1; }
  .btn-outline-secondary {
    border: 1px solid rgba(255,255,255,0.12) !important;
    color: #cbd5e1 !important;
    background: transparent !important;
    border-radius: 30px !important;
    font-weight: 600;
  }
  .btn-outline-secondary:hover {
    color: #fff !important;
    border-color: rgba(56,189,248,0.4) !important;
  }
  .btn-save-subly {
    background: #0ea5e9 !important;
    border: none !important;
    color: #fff !important;
    font-weight: 700;
    border-radius: 30px !important;
    box-shadow: 0 0 20px rgba(14,165,233,0.35);
    transition: all 0.2s;
  }
  .btn-save-subly:hover {
    background: #0284c7 !important;
    transform: translateY(-2px);
  }
  .layanan-info {
    font-size: 13px;
    color: #64748b;
    margin-bottom: 24px;
  }
  .layanan-info span { color: #38bdf8; font-weight: 600; }
</style>
</head>
<body>

<div class="edit-page-wrapper">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card card-custom shadow">
          <div class="card-header">
            <h4 class="m-0 text-white">Tambah Paket Layanan</h4>
          </div>
          <div class="card-body">

            {{-- Info layanan induk --}}
            <p class="layanan-info">Layanan: <span>{{ $layanan->nama_layanan }}</span></p>

            <form action="/paket/simpan" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id_layanan" value="{{ $layanan->id_layanan }}">

              <div class="mb-4">
                <label class="form-label">Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control"
                  placeholder="Contoh: 1 Bulan (Private - Full Akun)" required>
              </div>

              <div class="mb-4">
                <label class="form-label">Harga Paket (Rp)</label>
                <div class="price-prefix-group">
                  <span class="price-prefix">Rp</span>
                  <input type="text" name="harga" class="form-control"
                    placeholder="57000" required>
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label">Deskripsi Paket</label>
                <textarea name="deskripsi" class="form-control" rows="4"
                  placeholder="Contoh:&#10;- Akun Privat&#10;- Kualitas Ultra HD 4K&#10;- Garansi 30 Hari"></textarea>
                <small style="color:#64748b;font-size:12px;" class="mt-1 d-block">
                  Tiap baris ditampilkan sebagai poin di halaman detail layanan.
                </small>
              </div>

              <hr class="my-4">

              <div class="d-flex justify-content-end gap-2">
                <a href="/detailLayanan/{{ $layanan->id_layanan }}"
                  class="btn btn-outline-secondary px-4">Batal</a>
                <button type="submit" class="btn btn-save-subly px-4">Simpan Paket</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script src="{{ asset('/css/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>