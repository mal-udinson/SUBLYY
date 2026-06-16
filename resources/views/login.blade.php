<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Login</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <style>
        body {
            background-color: #0f172a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: radial-gradient(circle at center, #1e293b, #0f172a);
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 400px;
            padding: 40px;
        }
        .form-control {
            background-color: rgba(15, 23, 42, 0.8);
            border: 1px solid #334155;
            color: #f8fafc;
        }
        .form-control:focus {
            background-color: #0f172a;
            color: #ffffff;
            border-color: #0ea5e9;
            box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.25);
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <div class="text-center mb-4">
            <h2 class="text-info fw-bold mb-1">SUBLY</h2>
            <p class="text-secondary small">Masuk ke akun premium Anda</p>
        </div>
        
        @if(session('error'))
            <div class="alert alert-danger py-2 small">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success py-2 small">{{ session('success') }}</div>
        @endif

        <form action="/login" method="POST">
            {{ csrf_field() }}
            <div class="mb-3">
                <label class="form-label text-secondary small">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="form-label text-secondary small">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-info w-100 text-white fw-bold rounded-pill mb-3">Login</button>
            <div class="text-center">
                <span class="text-secondary small">Belum punya akun? <a href="/signin" class="text-info text-decoration-none">Daftar di sini</a></span>
            </div>
        </form>
    </div>
</body>
</html>