<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>SUBLY Admin - Edit Paket</title>
    <style>
        body { background-color: #0f172a; color: #ffffff; }
        .card-custom { background-color: #1e293b; border: none; border-radius: 12px; }
        .form-control { background-color: #334155; border: 1px solid #475569; color: #fff; }
        .form-control:focus { background-color: #334155; color: #fff; border-color: #38bdf8; box-shadow: none; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card card-custom shadow">
                    <div class="card-header border-bottom border-secondary p-4">
                        <h4 class="m-0 text-white fw-bold">Edit Paket Layanan</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="/paket/update" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_paket" value="{{ $paket->id_paket }}">
                            <input type="hidden" name="id_layanan" value="{{ $paket->id_layanan }}">

                            <div class="mb-4">
                                <label class="form-label fw-bold text-white">Nama Paket</label>
                                <input type="text" name="nama_paket" class="form-control" value="{{ $paket->nama_paket }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-white">Harga Paket (Rp)</label>
                                <input type="number" name="harga" class="form-control" value="{{ $paket->harga }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-white">Deskripsi Paket</label>
                                <textarea name="deskripsi" class="form-control" rows="4" style="background-color: #334155; color: #fff; border: 1px solid #475569; resize: none;" placeholder="Contoh:&#10;- Akun Privat&#10;- Kualitas Ultra HD 4K&#10;- Garansi 30 Hari">{{ $paket->deskripsi ?? '' }}</textarea>
                            </div>

                            <hr class="border-secondary my-4">

                            <div class="d-flex justify-content-end gap-2">
                                <a href="/detailLayanan/{{ $paket->id_layanan }}" class="btn btn-outline-secondary px-4 text-white">Batal</a>
                                <button type="submit" class="btn btn-info px-4 text-white fw-bold" style="background-color: #00aeef; border:none;">Simpan Perubahan Paket</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>