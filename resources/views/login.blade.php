<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY | Login</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
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
        }

        /* Ambient glow background */
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

        /* Subtle grid overlay */
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
            max-width: 440px;
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

        /* Top-edge cyan line accent */
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

        /* Corner decoration top-right */
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

        /* Brand */
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

        /* Alert overrides */
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
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        /* Form fields */
        .field-group {
            margin-bottom: 20px;
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

        /* Login button */
        .btn-login {
            width: 100%;
            padding: 14px;
            margin-top: 8px;
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

        /* Footer link */
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

        /* Divider line */
        .divider {
            border: none;
            border-top: 1px solid rgba(0, 212, 255, 0.06);
            margin: 28px 0 0;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
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

                <div class="field-group" style="margin-bottom: 28px;">
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

                <button type="submit" class="btn-login">Login</button>
            </form>

            <hr class="divider">
            <p class="register-prompt">
                Belum punya akun? <a href="/signin">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>
</html>