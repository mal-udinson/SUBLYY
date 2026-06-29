<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Login</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <style>

        /* Fix autofill browser override */
.field-input:-webkit-autofill,
.field-input:-webkit-autofill:hover,
.field-input:-webkit-autofill:focus,
.field-input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 1000px rgba(8,14,26,0.9) inset !important;
    -webkit-text-fill-color: #f1f5f9 !important;
    border-color: rgba(56,189,248,0.5) !important;
    transition: background-color 5000s ease-in-out 0s;
    caret-color: #f1f5f9;
}

.field-input {
    color-scheme: dark; /* tambahkan ini ke property yang sudah ada */
}

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #080e1a;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* ── Dot grid background ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(56,189,248,0.4) 1.2px, transparent 1.2px);
            background-size: 28px 28px;
            opacity: 0.45;
            pointer-events: none;
            z-index: 0;
        }

        /* ── Ambient glow top-center ── */
        body::after {
            content: '';
            position: fixed;
            top: -120px;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 480px;
            background: radial-gradient(ellipse at center, rgba(14,165,233,0.13) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* ── Side glow accents ── */
        .glow-left {
            position: fixed;
            bottom: -100px;
            left: -100px;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(56,189,248,0.07) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }

        .glow-right {
            position: fixed;
            top: -60px;
            right: -80px;
            width: 340px;
            height: 340px;
            background: radial-gradient(circle, rgba(14,165,233,0.06) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }

        .page-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 460px;
            padding: 20px;
        }

        /* ── Card ── */
        .auth-card {
            background: linear-gradient(145deg, rgba(13,25,48,0.85) 0%, rgba(8,14,26,0.92) 100%);
            border: 1px solid rgba(56,189,248,0.15);
            border-radius: 24px;
            padding: 52px 48px 44px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            box-shadow:
                0 0 0 1px rgba(56,189,248,0.05),
                0 24px 80px rgba(0,0,0,0.7),
                0 0 60px rgba(14,165,233,0.06),
                inset 0 1px 0 rgba(56,189,248,0.08);
        }

        /* Top cyan line accent */
        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 55%;
            height: 1px;
            background: linear-gradient(90deg, transparent, #38bdf8, transparent);
            opacity: 0.8;
        }

        /* Inner dot pattern on card */
        .auth-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(56,189,248,0.06) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
            opacity: 0.6;
        }

        .card-content {
            position: relative;
            z-index: 1;
        }

        /* ── Brand ── */
        .brand {
            text-align: center;
            margin-bottom: 40px;
        }

        .brand-logo {
            font-size: 30px;
            font-weight: 900;
            letter-spacing: 3px;
            color: #38bdf8;
            text-shadow:
                0 0 20px rgba(56,189,248,0.6),
                0 0 50px rgba(56,189,248,0.25);
            text-transform: uppercase;
            display: block;
            margin-bottom: 8px;
        }

        .brand-tagline {
            font-size: 13px;
            color: #64748b;
            font-weight: 400;
            letter-spacing: 0.2px;
        }

        /* ── Alert ── */
        .alert {
            border-radius: 10px;
            font-size: 13px;
            padding: 10px 14px;
            margin-bottom: 20px;
            border: none;
            font-family: 'Poppins', sans-serif;
        }
        .alert-danger {
            background: rgba(239,68,68,0.1);
            color: #f87171;
            border: 1px solid rgba(239,68,68,0.2);
        }
        .alert-success {
            background: rgba(34,197,94,0.1);
            color: #4ade80;
            border: 1px solid rgba(34,197,94,0.2);
        }

        /* ── Fields ── */
        .field-group {
            margin-bottom: 20px;
        }

        .field-label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #475569;
            margin-bottom: 8px;
        }

        .field-input {
            width: 100%;
            background: rgba(8,14,26,0.7);
            border: 1px solid rgba(56,189,248,0.1);
            border-radius: 12px;
            color: #f1f5f9;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 400;
            padding: 13px 16px;
            outline: none;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
        }

        .field-input::placeholder {
            color: #334155;
        }

        .field-input:focus {
            border-color: rgba(56,189,248,0.5);
            background: rgba(14,165,233,0.04);
            box-shadow:
                0 0 0 3px rgba(56,189,248,0.08),
                0 0 16px rgba(56,189,248,0.06);
        }

        /* ── Submit button ── */
        .btn-submit {
            width: 100%;
            padding: 14px;
            margin-top: 10px;
            border-radius: 14px;
            border: none;
            background: linear-gradient(135deg, #0ea5e9, #38bdf8, #0284c7);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow:
                0 4px 20px rgba(14,165,233,0.35),
                0 0 0 1px rgba(56,189,248,0.2);
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.12), transparent);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 32px rgba(14,165,233,0.5),
                0 0 0 1px rgba(56,189,248,0.35);
        }

        .btn-submit:hover::before { opacity: 1; }
        .btn-submit:active { transform: translateY(0); }

        /* ── Divider ── */
        .divider {
            border: none;
            border-top: 1px solid rgba(56,189,248,0.08);
            margin: 28px 0 0;
        }

        /* ── Footer link ── */
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #475569;
        }

        .auth-footer a {
            color: #38bdf8;
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.15s;
        }

        .auth-footer a:hover {
            opacity: 0.75;
            text-decoration: underline;
            text-decoration-color: rgba(56,189,248,0.4);
        }
    </style>
</head>
<body>
    <div class="glow-left"></div>
    <div class="glow-right"></div>

    <div class="page-wrapper">
        <div class="auth-card">
            <div class="card-content">
                <div class="brand">
                    <span class="brand-logo">SUBLY</span>
                    <p class="brand-tagline">Masuk ke akun premium Anda</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="/login" method="POST">
                    {{ csrf_field() }}

                    <div class="field-group">
                        <label class="field-label" for="username">Username</label>
                        <input
                            id="username"
                            type="text"
                            name="username"
                            class="field-input"
                            placeholder="Masukkan username"
                            required
                            autocomplete="username"
                        >
                    </div>

                    <div class="field-group" style="margin-bottom:28px;">
                        <label class="field-label" for="password">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="field-input"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </button>
                </form>

                <hr class="divider">
                <p class="auth-footer">
                    Belum punya akun? <a href="/signin">Daftar di sini</a>
                </p>
            </div>
        </div>

        <p style="text-align:center;margin-top:18px;font-size:13px;font-family:'Poppins',sans-serif;">
            <a href="/" style="
                color:#94a3b8;
                text-decoration:none;
                display:inline-flex;
                align-items:center;
                gap:6px;
                transition:color 0.2s;
            " onmouseover="this.style.color='#38bdf8'" onmouseout="this.style.color='#94a3b8'">
                <i class="bi bi-arrow-left" style="font-size:13px;"></i> Kembali ke Beranda
            </a>
        </p>

    </div>
    @include('partials.turbolinks-reinit')
</body>
</html>