<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBLY Admin | Tambah Layanan</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
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

        /* Dot grid background */
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

        /* Ambient glow */
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
            max-width: 520px;
            padding: 20px;
        }

        /* Card */
        .auth-card {
            background: linear-gradient(145deg, rgba(13,25,48,0.85) 0%, rgba(8,14,26,0.92) 100%);
            border: 1px solid rgba(56,189,248,0.15);
            border-radius: 24px;
            padding: 48px 48px 40px;
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

        /* Top cyan line */
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

        /* Inner dot pattern */
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

        /* Header */
        .page-header {
            margin-bottom: 32px;
        }

        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 600;
            color: #38bdf8;
            background: rgba(56,189,248,0.08);
            border: 1px solid rgba(56,189,248,0.2);
            padding: 4px 12px;
            border-radius: 20px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 800;
            color: #f1f5f9;
            letter-spacing: -0.3px;
            line-height: 1.2;
        }

        .page-title span { color: #38bdf8; }

        /* Fields */
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

        .field-input,
        .field-select {
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
            appearance: none;
            -webkit-appearance: none;
        }

        .field-input::placeholder { color: #334155; }

        .field-input:focus,
        .field-select:focus {
            border-color: rgba(56,189,248,0.5);
            background: rgba(14,165,233,0.04);
            box-shadow: 0 0 0 3px rgba(56,189,248,0.08), 0 0 16px rgba(56,189,248,0.06);
        }

        /* Autofill fix */
        .field-input:-webkit-autofill,
        .field-input:-webkit-autofill:hover,
        .field-input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0 1000px rgba(8,14,26,0.9) inset !important;
            -webkit-text-fill-color: #f1f5f9 !important;
            transition: background-color 5000s ease-in-out 0s;
            caret-color: #f1f5f9;
        }

        /* Select wrapper */
        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '\ea99'; /* tabler chevron-down */
            font-family: 'tabler-icons';
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #475569;
            font-size: 16px;
            pointer-events: none;
        }

        .field-select option {
            background: #0d1928;
            color: #f1f5f9;
        }

        /* File upload */
        .file-upload-area {
            width: 100%;
            background: rgba(8,14,26,0.7);
            border: 1px dashed rgba(56,189,248,0.2);
            border-radius: 12px;
            padding: 24px 16px;
            text-align: center;
            cursor: pointer;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .file-upload-area:hover {
            border-color: rgba(56,189,248,0.45);
            background: rgba(14,165,233,0.04);
        }

        .file-upload-area.has-file {
            border-color: rgba(56,189,248,0.4);
            border-style: solid;
            background: rgba(14,165,233,0.05);
        }

        .file-upload-icon {
            font-size: 28px;
            color: #38bdf8;
            opacity: 0.6;
            margin-bottom: 8px;
            display: block;
        }

        .file-upload-text {
            font-size: 13px;
            color: #475569;
            line-height: 1.5;
        }

        .file-upload-text span {
            color: #38bdf8;
            font-weight: 600;
        }

        .file-upload-hint {
            font-size: 11px;
            color: #334155;
            margin-top: 4px;
        }

        .file-upload-input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .file-name-display {
            display: none;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #38bdf8;
            font-weight: 500;
            margin-top: 6px;
        }

        .file-name-display.visible { display: flex; justify-content: center; }

        /* Divider */
        .form-divider {
            border: none;
            border-top: 1px solid rgba(56,189,248,0.08);
            margin: 28px 0 24px;
        }

        /* Buttons */
        .btn-group-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .btn-batal {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.1);
            color: #64748b;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            padding: 11px 24px;
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.2s;
        }

        .btn-batal:hover {
            border-color: rgba(255,255,255,0.2);
            color: #94a3b8;
            background: rgba(255,255,255,0.04);
        }

        .btn-simpan {
            background: linear-gradient(135deg, #0ea5e9, #38bdf8, #0284c7);
            border: none;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 700;
            padding: 11px 28px;
            border-radius: 12px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            letter-spacing: 0.3px;
            transition: all 0.2s;
            box-shadow: 0 4px 20px rgba(14,165,233,0.35), 0 0 0 1px rgba(56,189,248,0.2);
            position: relative;
            overflow: hidden;
        }

        .btn-simpan::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.12), transparent);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .btn-simpan:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(14,165,233,0.5), 0 0 0 1px rgba(56,189,248,0.35);
        }

        .btn-simpan:hover::before { opacity: 1; }
        .btn-simpan:active { transform: translateY(0); }

        /* Back link */
        .back-link {
            text-align: center;
            margin-top: 18px;
        }

        .back-link a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s;
        }

        .back-link a:hover { color: #38bdf8; }
    </style>
</head>
<body>
    <div class="glow-left"></div>
    <div class="glow-right"></div>

    <div class="page-wrapper">
        <div class="auth-card">
            <div class="card-content">

                <div class="page-header">
                    <div class="page-eyebrow">
                        <i class="ti ti-shield-lock"></i> Admin Panel
                    </div>
                    <h1 class="page-title">Tambah <span>Layanan</span> Baru</h1>
                </div>

                <form action="/tambah" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="field-group">
                        <label class="field-label" for="nama_layanan">Nama Layanan</label>
                        <input
                            type="text"
                            id="nama_layanan"
                            name="nama_layanan"
                            class="field-input"
                            placeholder="Contoh: Spotify Premium"
                            required
                            autocomplete="off"
                        >
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="kategori">Kategori</label>
                        <div class="select-wrapper">
                            <select id="kategori" name="kategori" class="field-select" required>
                                <option value="" disabled selected hidden>Pilih Kategori...</option>
                                <option value="Streaming & Movies">Streaming & Movies</option>
                                <option value="Music & Audio">Music & Audio</option>
                                <option value="AI & Productivity">AI & Productivity</option>
                            </select>
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Logo / Gambar Layanan</label>
                        <div class="file-upload-area" id="uploadArea">
                            <input
                                type="file"
                                name="gambar_logo"
                                accept="image/*"
                                class="file-upload-input"
                                id="fileInput"
                                required
                                onchange="handleFileChange(this)"
                            >
                            <i class="ti ti-cloud-upload file-upload-icon"></i>
                            <p class="file-upload-text"><span>Klik untuk upload</span> atau drag & drop</p>
                            <p class="file-upload-hint">PNG, JPG, WEBP — Maks 2MB</p>
                            <div class="file-name-display" id="fileNameDisplay">
                                <i class="ti ti-check"></i>
                                <span id="fileNameText"></span>
                            </div>
                        </div>
                    </div>

                    <hr class="form-divider">

                    <div class="btn-group-actions">
                        <a href="/" class="btn-batal">
                            <i class="ti ti-x"></i> Batal
                        </a>
                        <button type="submit" class="btn-simpan">
                            <i class="ti ti-device-floppy"></i> Simpan Layanan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function handleFileChange(input) {
            const area    = document.getElementById('uploadArea');
            const display = document.getElementById('fileNameDisplay');
            const text    = document.getElementById('fileNameText');

            if (input.files && input.files[0]) {
                area.classList.add('has-file');
                display.classList.add('visible');
                text.textContent = input.files[0].name;
            } else {
                area.classList.remove('has-file');
                display.classList.remove('visible');
            }
        }
    </script>
    @include('partials.turbolinks-reinit')
</body>
</html>