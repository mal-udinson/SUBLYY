<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SUBLY | Edit Layanan</title>
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

  ::-webkit-scrollbar { width: 2px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: #38bdf8; border-radius: 2px; }
  ::-webkit-scrollbar-thumb:hover { background: #7dd3fc; }

  /* ===================== PAGE CONTENT ===================== */
  .edit-page-wrapper {
    padding: 60px 24px 80px;
    min-height: 100vh;
    background:
      radial-gradient(ellipse at 10% 0%, rgba(14, 165, 233, 0.16) 0%, transparent 50%),
      radial-gradient(ellipse at 90% 15%, rgba(56, 189, 248, 0.10) 0%, transparent 45%),
      radial-gradient(ellipse at 30% 90%, rgba(14, 165, 233, 0.09) 0%, transparent 55%),
      radial-gradient(ellipse at 75% 75%, rgba(56, 189, 248, 0.07) 0%, transparent 50%),
      radial-gradient(circle, rgba(56, 189, 248, 0.18) 1.2px, transparent 1.2px) 0 0/28px 28px,
      #080e1a;
    position: relative;
  }

  .edit-page-wrapper .container { position: relative; z-index: 1; }

  .breadcrumb-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: #38bdf8;
    text-decoration: none;
    margin-bottom: 20px;
    opacity: 0.8;
    transition: opacity 0.2s;
  }
  .breadcrumb-back:hover { opacity: 1; color: #7dd3fc; }

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
    letter-spacing: -0.3px;
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

  .form-label.fw-bold {
    font-size: 13px;
    font-weight: 600 !important;
    color: #cbd5e1 !important;
    letter-spacing: 0.2px;
    margin-bottom: 8px;
  }

  .form-control, .form-select {
    background-color: rgba(255,255,255,0.04) !important;
    border: 1px solid rgba(255,255,255,0.08) !important;
    color: #f1f5f9 !important;
    border-radius: 12px;
    padding: 11px 16px;
    font-size: 14px;
    transition: all 0.25s ease;
  }

  .form-control::placeholder { color: #475569; }

  .form-control:focus, .form-select:focus {
    background-color: rgba(14, 165, 233, 0.06) !important;
    border-color: rgba(56, 189, 248, 0.45) !important;
    box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1), 0 0 16px rgba(56, 189, 248, 0.08) !important;
    color: #fff !important;
  }

  .form-select option {
    background-color: #1e293b;
    color: #f1f5f9;
  }

  /* file input styling */
  .form-control[type="file"] {
    padding: 9px 14px;
  }
  .form-control[type="file"]::file-selector-button {
    background: rgba(56,189,248,0.12);
    border: 1px solid rgba(56,189,248,0.3);
    color: #7dd3fc;
    border-radius: 8px;
    padding: 6px 14px;
    font-size: 12.5px;
    font-weight: 600;
    margin-right: 14px;
    transition: all 0.2s;
  }
  .form-control[type="file"]::file-selector-button:hover {
    background: #0ea5e9;
    color: #fff;
    border-color: #0ea5e9;
  }

  .logo-preview-box {
    width: 100px;
    height: 100px;
    border-radius: 14px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(56,189,248,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    margin-bottom: 14px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.3);
  }

  .logo-preview-box img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    border-radius: 6px;
  }

  small.text-secondary {
    color: #64748b !important;
    font-size: 12px !important;
  }

  hr.border-secondary {
    border-color: rgba(56,189,248,0.12) !important;
    opacity: 1;
  }

  .btn-outline-secondary {
    border: 1px solid rgba(255,255,255,0.12) !important;
    color: #cbd5e1 !important;
    background: transparent !important;
    border-radius: 30px !important;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.2s;
  }

  .btn-outline-secondary:hover {
    color: #fff !important;
    border-color: rgba(56,189,248,0.4) !important;
    background: rgba(255,255,255,0.04) !important;
  }

  .btn-save-subly {
    background: #0ea5e9 !important;
    border: none !important;
    color: #fff !important;
    font-weight: 700;
    font-size: 14px;
    border-radius: 30px !important;
    box-shadow: 0 0 20px rgba(14,165,233,0.35);
    transition: all 0.2s;
  }

  .btn-save-subly:hover {
    background: #0284c7 !important;
    box-shadow: 0 0 30px rgba(14,165,233,0.55);
    transform: translateY(-2px);
  }

  @media (max-width: 576px) {
    .card-custom .card-body { padding: 22px !important; }
    .card-custom .card-header { padding: 20px !important; }
  }
</style>
</head>
<body>

{{-- ===================== NAVBAR (silakan isi sendiri) ===================== --}}

{{-- ===================== EDIT FORM ===================== --}}
<div class="edit-page-wrapper">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="card card-custom shadow">
          <div class="card-header">
            <h4 class="m-0 text-white">Edit Informasi Produk Layanan</h4>
          </div>
          <div class="card-body">
            @php $l = $layanan[0]; @endphp
            <form action="/edit" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="id_layanan" value="{{ $l->id_layanan }}">

              <div class="mb-4">
                <label class="form-label fw-bold">Nama Layanan</label>
                <input type="text" name="nama_layanan" class="form-control" value="{{ $l->nama_layanan }}" required>
              </div>

              <div class="row">
                <div class="col-md-12 mb-3">
                  <label class="form-label fw-bold">Kategori</label>
                  <select name="kategori" class="form-select" required>
                    <option value="Streaming & Movies" {{ $l->kategori == 'Streaming & Movies' ? 'selected' : '' }}>Streaming & Movies</option>
                    <option value="Music & Audio" {{ $l->kategori == 'Music & Audio' ? 'selected' : '' }}>Music & Audio</option>
                    <option value="AI & Productivity" {{ $l->kategori == 'AI & Productivity' ? 'selected' : '' }}>AI & Productivity</option>
                  </select>
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label fw-bold d-block">Logo Saat Ini</label>
                @if($l->gambar_logo)
                <div class="logo-preview-box">
                  <img src="{{ asset('storage/'.$l->gambar_logo) }}" alt="Logo">
                </div>
                @endif
                <input type="file" name="gambar_logo" accept="image/*" class="form-control">
                <small class="text-secondary mt-1 d-block">Kosongkan jika tidak ingin mengubah logo.</small>
              </div>

              <div class="mb-4">
                <label class="form-label fw-bold d-block">Logo Clean (Tanpa Background)</label>
                @if($l->gambar_logo_clean)
                <div class="logo-preview-box">
                  <img src="{{ asset('storage/'.$l->gambar_logo_clean) }}" alt="Logo Clean">
                </div>
                @endif
                <input type="file" name="gambar_logo_clean" accept="image/*" class="form-control">
                <small class="text-secondary mt-1 d-block">Kosongkan jika tidak ingin mengubah. Dipakai untuk halaman detail.</small>
              </div>

              <hr class="border-secondary my-4">

              <div class="d-flex justify-content-end gap-2">
                <a href="/" class="btn btn-outline-secondary px-4">Batal</a>
                <button type="submit" class="btn btn-save-subly px-4">Simpan Perubahan</button>
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