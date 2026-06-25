<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan - SUBLY</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            background-color: #0f172a; 
            font-family: 'Poppins', sans-serif;
            color: #f8fafc;
            background-image: radial-gradient(circle at top left, #1e293b, #0f172a);
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        }

        h4 { color: #38bdf8; font-weight: 600; margin-top: 2rem; margin-bottom: 1rem; font-size: 1.1rem; }
        p, li { color: #cbd5e1; font-size: 0.95rem; line-height: 1.8; }
        .back-btn { transition: all 0.3s ease; }
        .back-btn:hover { transform: translateX(-5px); }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <a href="{{ url()->previous() }}" class="btn btn-link text-info text-decoration-none px-0 mb-4 fw-medium back-btn">
                    ← Kembali ke Halaman Sebelumnya
                </a>

                <div class="glass-card p-4 p-md-5 mb-5">
                    <h2 class="fw-bold text-white mb-2">Syarat & Ketentuan Layanan</h2>
                    <p class="text-secondary border-bottom border-secondary pb-4 mb-4">Pembaruan Terakhir: Juni 2026</p>

                    <p>Selamat datang di SUBLY. Dengan mengakses dan melakukan pembelian layanan di website kami, Anda dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan di bawah ini.</p>

                    <h4>1. Ketentuan Umum</h4>
                    <ul>
                        <li>Akun yang disediakan bersifat legal dan resmi sesuai dengan paket langganan yang dipilih.</li>
                        <li>Dilarang keras mengubah kata sandi, email, profil, atau pengaturan pembayaran pada akun berjenis <strong>Sharing</strong>.</li>
                        <li>Pelanggaran terhadap aturan penggunaan akan mengakibatkan garansi hangus dan akun ditarik tanpa pengembalian dana (refund).</li>
                    </ul>

                    <h4>2. Kebijakan Garansi</h4>
                    <ul>
                        <li>Garansi berlaku penuh sesuai durasi paket yang Anda beli (misal: garansi 30 hari untuk paket 1 bulan).</li>
                        <li>Klaim garansi dapat dilakukan melalui nomor WhatsApp admin dengan menyertakan bukti <strong>ID Transaksi</strong>.</li>
                        <li>Proses perbaikan akun bermasalah memakan waktu estimasi 1x24 jam hari kerja.</li>
                    </ul>

                    <h4>3. Kebijakan Pengembalian Dana (Refund)</h4>
                    <ul>
                        <li>Pengembalian dana hanya dapat diproses apabila stok akun sedang kosong dan admin tidak dapat menyediakan akun pengganti dalam waktu 3x24 jam.</li>
                        <li>Pembelian yang salah dilakukan oleh pelanggan (salah pilih paket) tidak dapat dibatalkan atau di-refund.</li>
                    </ul>

                    <div class="alert mt-5 mb-0 text-center" style="background-color: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.2);">
                        <p class="mb-0 text-info small fw-medium">Jika Anda memiliki pertanyaan lebih lanjut mengenai ketentuan ini, silakan hubungi tim dukungan kami melalui menu kontak.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>