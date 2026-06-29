<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Daftar Akun</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <style>
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
            position: relative;
            padding: 28px 0;
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
            max-width: 500px;
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
            margin-bottom: 36px;
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

        /* ── Fields ── */
        .field-group {
            margin-bottom: 18px;
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

        /* ── Password field with toggle ── */
        .input-password-wrapper {
            position: relative;
        }

        .input-password-wrapper .field-input {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            right: 1px;
            top: 1px;
            bottom: 1px;
            width: 44px;
            background: transparent;
            border: none;
            border-left: 1px solid rgba(56,189,248,0.08);
            border-radius: 0 11px 11px 0;
            color: #334155;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            transition: color 0.15s ease;
        }

        .toggle-password:hover {
            color: #38bdf8;
        }

        /* ── Two-column row ── */
        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 18px;
        }

        /* ── Terms ── */
        .terms-group {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 24px;
            margin-top: 4px;
        }

        .terms-checkbox {
            -webkit-appearance: none;
            appearance: none;
            width: 17px;
            height: 17px;
            min-width: 17px;
            border: 1px solid rgba(56,189,248,0.25);
            border-radius: 5px;
            background: rgba(8,14,26,0.7);
            cursor: pointer;
            margin-top: 2px;
            position: relative;
            transition: border-color 0.15s, background 0.15s;
        }

        .terms-checkbox:checked {
            background: #0ea5e9;
            border-color: #0ea5e9;
            box-shadow: 0 0 8px rgba(14,165,233,0.4);
        }

        .terms-checkbox:checked::after {
            content: '';
            position: absolute;
            left: 4px;
            top: 1px;
            width: 6px;
            height: 10px;
            border: 2px solid #fff;
            border-top: none;
            border-left: none;
            transform: rotate(45deg);
        }

        .terms-label {
            font-size: 12.5px;
            color: #475569;
            line-height: 1.55;
            cursor: pointer;
        }

        .terms-label a {
            color: #38bdf8;
            text-decoration: none;
            font-weight: 500;
        }

        .terms-label a:hover {
            text-decoration: underline;
            text-decoration-color: rgba(56,189,248,0.4);
        }

        /* ── Submit button ── */
        .btn-submit {
            width: 100%;
            padding: 14px;
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

        /* ── Divider + footer ── */
        .divider {
            border: none;
            border-top: 1px solid rgba(56,189,248,0.08);
            margin: 28px 0 0;
        }

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
                    <p class="brand-tagline">Buat akun baru Anda</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="/registrasi" method="POST">
                    {{ csrf_field() }}

                    <div class="field-group">
                        <label class="field-label" for="email">Alamat Email</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="field-input"
                            placeholder="contoh@email.com"
                            required
                            autocomplete="email"
                        >
                    </div>

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

                    <div class="field-row">
                        <div>
                            <label class="field-label" for="password">Buat Password</label>
                            <div class="input-password-wrapper">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="field-input"
                                    placeholder="••••••••"
                                    required
                                    autocomplete="new-password"
                                >
                                <button type="button" class="toggle-password" onclick="togglePass('password','icon1')" tabindex="-1">
                                    <i class="bi bi-eye" id="icon1"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="field-label" for="confirm_password">Ulangi Password</label>
                            <div class="input-password-wrapper">
                                <input
                                    id="confirm_password"
                                    type="password"
                                    name="confirm_password"
                                    class="field-input"
                                    placeholder="••••••••"
                                    required
                                    autocomplete="new-password"
                                >
                                <button type="button" class="toggle-password" onclick="togglePass('confirm_password','icon2')" tabindex="-1">
                                    <i class="bi bi-eye" id="icon2"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="terms-group">
                        <input type="checkbox" class="terms-checkbox" id="terms" required>
                        <label class="terms-label" for="terms">
                            Saya setuju dengan <a href="/syarat-ketentuan">Syarat &amp; Ketentuan</a> privasi SUBLY.
                        </label>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                    </button>
                </form>

                <hr class="divider">
                <p class="auth-footer">
                    Sudah punya akun? <a href="/halaman-login">Login di sini</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePass(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon  = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
    @include('partials.turbolinks-reinit')
</body>
</html>