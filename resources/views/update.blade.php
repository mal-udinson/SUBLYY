<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <title>Edit Video - Salam-Tube Haliim</title>
    <style>
        .header-madani {
            background-color: #212529;
            color: #ffffff;
            padding: 30px 0;
            text-align: center;
            margin-bottom: 40px;
        }

        .card-form {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .card-header-custom {
            background-color: #f8f9fa;
            border-bottom: 1px solid #edf2f7;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-light">

    <div class="header-madani">
        <h1 class="m-0 font-weight-bold" style="letter-spacing: 1px;">Salam-Tube Haliim</h1>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center mb-3">
            <div class="col-lg-8">
                <h2 class="text-secondary fs-4 m-0">Welcome, {{ session()->get('username') }}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="card card-form">
                    <div class="card-header card-header-custom p-3">
                        <h5 class="m-0 text-secondary">Ubah Informasi Data Video</h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="/edit" method="post" enctype="multipart/form-data">
                            
                            {{ csrf_field() }}
                            
                            <table class="table table-borderless align-middle">
                                @foreach($videos as $v)
                                <tr>
                                    <td width="30%" class="fw-bold text-muted">Id Video</td>
                                    <td>
                                        <span class="badge bg-dark px-3 py-2 fs-6">{{ $v->idvideo }}</span>
                                        <input type="hidden" name="idvideo" value="{{ $v->idvideo }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">Judul Video</td>
                                    <td><input type="text" name="judul" class="form-control form-control-lg" value="{{ $v->judul }}"></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">Creator</td>
                                    <td><input type="text" name="creator" class="form-control form-control-lg" value="{{ $v->creator }}"></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">Description</td>
                                    <td><textarea name="description" class="form-control" rows="3">{{ $v->description }}</textarea></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">Statistik Saat Ini</td>
                                    <td>
                                        <div class="p-2 bg-light border rounded text-secondary shadow-sm">
                                            <strong>Rating:</strong> {{ $v->rating }} &nbsp;|&nbsp; <strong>Penonton:</strong> {{ $v->viewer }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">Video Saat Ini</td>
                                    <td>
                                        <div class="p-2 bg-white d-inline-block border rounded shadow-sm mb-2">
                                            <video width="250" controls class="rounded">
                                                <source src="{{ Storage::url($v->alamatvideo) }}" type="video/mp4">
                                                Browser Anda tidak mendukung tag video.
                                            </video>
                                        </div>
                                        <div class="text-muted small mb-1">Upload video baru jika ingin mengganti:</div>
                                        <input type="file" name="alamatvideo" accept="video/*" class="form-control">
                                    </td>
                                </tr>
                                @endforeach
                            </table>

                            <hr class="text-muted my-4">
                        <div class="d-flex justify-content-end gap-2">
                                    <a href="/home" class="btn btn-light btn-lg px-4 border">Kembali</a>
                                    <input type="submit" class="btn btn-success btn-lg px-5 shadow-sm" value="Simpan Perubahan">
                                </div>
                            </form>

                        </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
