<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Edit Paket Layanan</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <style>
        body {
            background-color: #0f172a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card-form {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 16px;
            width: 100%;
            max-width: 550px;
        }

        .form-control {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #f8fafc;
        }
        
        .form-control:focus {
            background-color: #0f172a;
            color: #ffffff;
            border-color: #0ea5e9;
            box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.25);
        }

        .btn-simpan {
            background-color: #0ea5e9;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-simpan:hover {
            background-color: #0284c7;
            color: white;
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
        }
    </style>
</head>
<body>

    <div class="card card-form shadow-lg p-4">
        <h3 class="fw-bold text-white mb-1">Edit Paket Pilihan</h3>
            <form action="/paket/update" method="POST">
                @csrf
                <input type="hidden" name="id_paket" value="{{ $paket->id_paket }}">
                <input type="hidden" name="id_layanan" value="{{ $layanan->id_layanan }}">

                <div class="mb-3">
                    <label class="form-label text-secondary small fw-bold">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control py-2" value="{{ $paket->nama_paket }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-white">Harga Paket (Rp)</label>
                    <input type="text" name="harga" class="form-control" value="{{ $paket->harga }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-white">Deskripsi Paket</label>
                    <textarea name="deskripsi" class="form-control" rows="4" style="background-color: #334155; color: #fff; border: 1px solid #475569; resize: none;">{{ $paket->deskripsi }}</textarea>
                </div>

            <div class="d-flex gap-2 justify-content-end border-top border-secondary pt-3">
                <a href="/detailLayanan/{{ $layanan->id_layanan }}" class="btn btn-outline-secondary px-4 rounded-pill fw-bold">Batal</a>
                <button type="submit" class="btn btn-simpan px-4 rounded-pill fw-bold">Simpan Paket</button>
            </div>
        </form>
    </div>

</body>
</html>