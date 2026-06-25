<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>SUBLY Admin - Edit Layanan</title>
    <style>
        body { background-color: #0f172a; color: #ffffff; }
        .card-custom { background-color: #1e293b; border: none; border-radius: 12px; }
        .form-control, .form-select { background-color: #334155; border: 1px solid #475569; color: #fff; }
        .form-control:focus, .form-select:focus { background-color: #334155; color: #fff; border-color: #38bdf8; box-shadow: none; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-custom shadow">
                    <div class="card-header border-bottom border-secondary p-4">
                        <h4 class="m-0 text-white fw-bold">Edit Informasi Produk Layanan</h4>
                    </div>
                    <div class="card-body p-4">
                        @foreach($layanan as $l)
                        <form action="/edit" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_layanan" value="{{ $l->id_layanan }}">

                            <div class="mb-4">
                                <label class="form-label fw-bold text-white">Nama Layanan</label>
                                <input type="text" name="nama_layanan" class="form-control" value="{{ $l->nama_layanan }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold text-white">Kategori</label>
                                    <select name="kategori" class="form-select" style="background-color: #334155; color: #fff; border: 1px solid #475569;" required>
                                        <option value="Streaming & Movies" {{ $layanan[0]->kategori == 'Streaming & Movies' ? 'selected' : '' }}>Streaming & Movies</option>
                                        <option value="Music & Audio" {{ $layanan[0]->kategori == 'Music & Audio' ? 'selected' : '' }}>Music & Audio</option>
                                        <option value="AI & Productivity" {{ $layanan[0]->kategori == 'AI & Productivity' ? 'selected' : '' }}>AI & Productivity</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-white d-block">Logo Saat Ini</label>
                                @if($l->gambar_logo)
                                <div class="mb-3">
                                    <img src="{{ asset('data_file/'.$l->gambar_logo) }}" width="90" class="rounded border border-secondary shadow-sm" alt="Logo">
                                </div>
                                @endif
                                <input type="file" name="gambar_logo" accept="image/*" class="form-control">
                                <small class="text-secondary mt-1 d-block">Kosongkan jika tidak ingin mengubah logo.</small>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-white d-block">Logo Clean (Tanpa Background)</label>
                                @if($l->gambar_logo_clean)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/'.$l->gambar_logo_clean) }}" width="90" class="rounded border border-secondary shadow-sm" alt="Logo Clean" style="background: #334155; padding: 5px;">
                                </div>
                                @endif
                                <input type="file" name="gambar_logo_clean" accept="image/*" class="form-control">
                                <small class="text-secondary mt-1 d-block">Kosongkan jika tidak ingin mengubah. Dipakai untuk halaman detail.</small>
                            </div>

                            <hr class="border-secondary my-4">

                            <div class="d-flex justify-content-end gap-2">
                                <a href="/" class="btn btn-outline-secondary px-4 text-white">Batal</a>
                                <button type="submit" class="btn btn-info px-4 text-white fw-bold shadow-sm" style="background-color: #00aeef; border:none;">Simpan Perubahan</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>