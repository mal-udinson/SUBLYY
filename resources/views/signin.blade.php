<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Daftar Akun</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --cyan: #00d4ff;
            --cyan-dim: rgba(0, 212, 255, 0.15);
            --cyan-glow: rgba(0, 212, 255, 0.35);
            --bg-deep: #060c14;
            --bg-card: #0c1422;
            --bg-input: #080e19;
            --border-subtle: rgba(0, 212, 255, 0.12);
            --border-active: rgba(0, 212, 255, 0.6);
            --text-primary: #f0f6ff;
            --text-secondary: #5a7a9a;
            --text-muted: #3a5570;
        }

        body {
            background-color: var(--bg-deep);
            font-family: 'Inter', 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden;
            position: relative;
            padding: 24px 0;
        }

        body::before {
            content: '';
            position: fixed;
            top: -20%;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 500px;
            background: radial-gradient(ellipse at center, rgba(0, 212, 255, 0.06) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(0, 212, 255, 0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 212, 255, 0.025) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        .login-card {
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
            padding: 48px 44px;
            position: relative;
            overflow: hidden;
            box-shadow:
                0 0 0 1px rgba(0, 212, 255, 0.04),
                0 20px 60px rgba(0, 0, 0, 0.7),
                0 0 80px rgba(0, 212, 255, 0.04);
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--cyan), transparent);
            opacity: 0.6;
        }

        .login-card::after {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 212, 255, 0.07) 0%, transparent 70%);
            pointer-events: none;
        }

        .brand {
            text-align: center;
            margin-bottom: 36px;
        }

        .brand-logo {
            font-size: 28px;
            font-weight: 900;
            letter-spacing: 4px;
            color: var(--cyan);
            text-shadow: 0 0 24px rgba(0, 212, 255, 0.5);
            text-transform: uppercase;
            display: block;
            margin-bottom: 8px;
        }

        .brand-tagline {
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        .alert {
            border-radius: 10px;
            font-size: 13px;
            padding: 10px 14px;
            margin-bottom: 20px;
            border: none;
        }
        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .field-group {
            margin-bottom: 18px;
        }

        .field-label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .field-input {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid rgba(0, 212, 255, 0.1);
            border-radius: 10px;
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 400;
            padding: 13px 16px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            -webkit-appearance: none;
        }

        .field-input::placeholder {
            color: var(--text-muted);
        }

        .field-input:focus {
            border-color: var(--border-active);
            box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.08), inset 0 0 10px rgba(0, 212, 255, 0.03);
        }

        /* Password input with toggle button */
        .input-password-wrapper {
            position: relative;
        }

        .input-password-wrapper .field-input {
            padding-right: 46px;
        }

        .toggle-password {
            position: absolute;
            right: 1px;
            top: 1px;
            bottom: 1px;
            width: 42px;
            background: transparent;
            border: none;
            border-left: 1px solid rgba(0, 212, 255, 0.08);
            border-radius: 0 9px 9px 0;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            transition: color 0.15s ease;
        }

        .toggle-password:hover {
            color: var(--cyan);
        }

        /* Two-column row */
        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 18px;
        }

        /* Terms checkbox */
        .terms-group {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 26px;
            margin-top: 4px;
        }

        .terms-checkbox {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            min-width: 16px;
            border: 1px solid rgba(0, 212, 255, 0.25);
            border-radius: 4px;
            background: var(--bg-input);
            cursor: pointer;
            margin-top: 1px;
            position: relative;
            transition: border-color 0.15s ease, background 0.15s ease;
        }

        .terms-checkbox:checked {
            background: var(--cyan);
            border-color: var(--cyan);
        }

        .terms-checkbox:checked::after {
            content: '';
            position: absolute;
            left: 4px;
            top: 1px;
            width: 5px;
            height: 9px;
            border: 2px solid #060c14;
            border-top: none;
            border-left: none;
            transform: rotate(45deg);
        }

        .terms-label {
            font-size: 12.5px;
            color: var(--text-secondary);
            line-height: 1.5;
            cursor: pointer;
        }

        .terms-label a {
            color: var(--cyan);
            text-decoration: none;
            font-weight: 500;
        }

        .terms-label a:hover {
            text-decoration: underline;
            text-decoration-color: rgba(0, 212, 255, 0.4);
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, #00c8f0, #00d4ff, #00b8e0);
            color: #060c14;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 20px rgba(0, 212, 255, 0.3);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 30px rgba(0, 212, 255, 0.45);
        }

        .btn-login:hover::before {
            opacity: 1;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            border: none;
            border-top: 1px solid rgba(0, 212, 255, 0.06);
            margin: 28px 0 0;
        }

        .register-prompt {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: var(--text-secondary);
        }

        .register-prompt a {
            color: var(--cyan);
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.15s ease;
        }

        .register-prompt a:hover {
            opacity: 0.8;
            text-decoration: underline;
            text-decoration-color: rgba(0, 212, 255, 0.4);
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
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
                            <button type="button" class="toggle-password" onclick="togglePassword('password', 'icon1')" tabindex="-1">
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
                            <button type="button" class="toggle-password" onclick="togglePassword('confirm_password', 'icon2')" tabindex="-1">
                                <i class="bi bi-eye" id="icon2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="terms-group">
                    <input type="checkbox" class="terms-checkbox" id="terms" required>
                    <label class="terms-label" for="terms">
                        Saya setuju dengan <a href="#">Syarat &amp; Ketentuan</a> privasi SUBLY.
                    </label>
                </div>

                <button type="submit" class="btn-login">Daftar Sekarang</button>
            </form>

            <hr class="divider">
            <p class="register-prompt">
                Sudah punya akun? <a href="/halaman-login">Login di sini</a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>