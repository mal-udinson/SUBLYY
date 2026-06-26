<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - SUBLY</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.1.3-dist/css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            background-color: #0f172a; 
            font-family: 'Poppins', sans-serif;
            color: #f8fafc;
            background-image: radial-gradient(circle at top center, #1e293b, #0f172a);
            min-height: 100vh;
        }

        /* Desain Card Transparan Modern */
        .glass-card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }

        /* Kustomisasi Tabel Gelap */
        .table-glass {
            color: #e2e8f0;
            margin-bottom: 0;
        }
        
        .table-glass thead th {
            background-color: rgba(15, 23, 42, 0.8);
            border-bottom: 2px solid #334155;
            color: #94a3b8;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px 20px;
            border-top: none;
        }
        
        .table-glass tbody td {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            vertical-align: middle;
            padding: 18px 20px;
            font-size: 14px;
            background-color: transparent;
            transition: all 0.2s ease;
        }

        /* Efek Hover Baris Tabel */
        .table-glass tbody tr:hover td {
            background-color: rgba(255, 255, 255, 0.03);
        }

        /* Desain Badge Modern (Soft Colors) */
        .badge-soft-warning {
            background-color: rgba(245, 158, 11, 0.15);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        .badge-soft-success {
            background-color: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        .badge-soft-danger {
            background-color: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        .badge-soft-info {
            background-color: rgba(56, 189, 248, 0.1);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.2);
        }
    </style>
</head>
<body>
    
    <div class="container py-5">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h3 class="fw-bold text-white mb-1">
                    {{ session('status') == 'admin' ? 'Kelola Pesanan Pelanggan' : 'Riwayat Pembelian' }}
                </h3>
                <p class="text-secondary small mb-0">
                    {{ session('status') == 'admin' ? 'Konfirmasi dan proses pesanan yang masuk dari pembeli.' : 'Kelola dan pantau status tagihan langganan Anda.' }}
                </p>
            </div>
            <a href="/" class="btn btn-outline-info rounded-pill px-4 fw-semibold shadow-sm">
                Kembali ke Katalog
            </a>
        </div>

        <div class="glass-card">
            <div class="table-responsive">
                <table class="table table-glass border-0">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            
                            @if(session('status') == 'admin')
                                <th width="20%">Pelanggan</th>
                            @endif
                            
                            <th width="15%">Layanan</th>
                            <th width="25%">Paket Terpilih</th>
                            <th width="15%">Total Bayar</th>
                            <th width="10%">Metode</th>
                            <th width="10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proses_transaksi as $index => $t)
                            <tr>
                                <td class="text-center text-secondary fw-semibold">{{ $index + 1 }}</td>
                                
                                @if(session('status') == 'admin')
                                    <td>
                                        <div class="text-white fw-medium mb-1">{{ $t->nama_lengkap }}</div>
                                        <div class="text-secondary" style="font-size: 11px;">
                                            <span class="text-info">WA:</span> {{ $t->nomor_whatsapp }}
                                        </div>
                                    </td>
                                @endif
                                
                                <td class="fw-bold text-white">
                                    {{ $t->nama_layanan }}
                                </td>
                                
                                <td>
                                    <span class="badge badge-soft-info px-3 py-2 rounded-pill fw-medium" style="font-size: 12px;">
                                        {{ $t->nama_paket }}
                                    </span>
                                </td>
                                
                                <td class="fw-bold text-info" style="font-size: 15px;">
                                    Rp {{ number_format($t->harga, 0, ',', '.') }}
                                </td>
                                
                                <td>
                                    <span class="text-light opacity-75 small">
                                        {{ $t->metode_pembayaran }}
                                    </span>
                                </td>
                                
                                <td class="align-middle">
                                    @if(session('status') == 'admin')
                                        
                                        @if($t->status_pesanan == 'Pending' || $t->status_pesanan == 'Diproses')
                                            <div class="mb-2">
                                                @if($t->status_pesanan == 'Diproses')
                                                    <span class="badge badge-soft-info px-2 py-1 fw-bold" style="font-size: 11px;">Perlu Verifikasi</span>
                                                @else
                                                    <span class="badge badge-soft-warning px-2 py-1 fw-bold" style="font-size: 11px;">Menunggu Pembayaran</span>
                                                @endif
                                            </div>
                                            
                                            <div class="d-grid gap-2">
                                                <a href="/transaksi/sukses/{{ $t->id_transaksi }}" class="btn btn-sm btn-success rounded fw-bold shadow-sm" style="font-size: 11px;">
                                                    Konfirmasi Pesanan
                                                </a>
                                                <a href="/transaksi/batal/{{ $t->id_transaksi }}" class="btn btn-sm btn-outline-danger rounded fw-bold" style="font-size: 11px;">
                                                    Tolak Pesanan
                                                </a>
                                            </div>

                                        @elseif($t->status_pesanan == 'Sukses' || $t->status_pesanan == 'Berhasil')
                                            <span class="badge badge-soft-success px-3 py-2 rounded-pill fw-bold" style="font-size: 12px;">Transaksi Selesai</span>
                                        @else
                                            <span class="badge badge-soft-danger px-3 py-2 rounded-pill fw-bold" style="font-size: 12px;">Dibatalkan</span>
                                        @endif

                                    @else
                                        
                                        @if($t->status_pesanan == 'Pending')
                                            <span class="badge badge-soft-warning px-3 py-2 rounded-pill fw-bold mb-2 d-block" style="font-size: 12px;">Menunggu Pembayaran</span>
                                            <a href="/konfirmasi-pembayaran/{{ $t->id_transaksi }}" class="btn btn-sm btn-info text-white fw-bold rounded-pill w-100 shadow-sm" style="font-size: 11px;">
                                            Kirim Bukti Pembayaran
                                            </a>
                                        @elseif($t->status_pesanan == 'Diproses')
                                            <span class="badge badge-soft-info px-3 py-2 rounded-pill fw-bold" style="font-size: 12px;">Sedang Diverifikasi</span>
                                            <p class="text-secondary mt-1 mb-0" style="font-size: 11px;">Pengecekan oleh tim admin</p>
                                        @elseif($t->status_pesanan == 'Sukses' || $t->status_pesanan == 'Berhasil')
                                            <span class="badge badge-soft-success px-3 py-2 rounded-pill fw-bold" style="font-size: 12px;">Langganan Aktif</span>
                                        @else
                                            <span class="badge badge-soft-danger px-3 py-2 rounded-pill fw-bold" style="font-size: 12px;">Pesanan Dibatalkan</span>
                                        @endif

                                    @endif
                                </td>                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ session('status') == 'admin' ? 7 : 6 }}" class="text-center py-5">
                                    <div class="mb-3 text-secondary" style="font-size: 40px;">🛒</div>
                                    <h5 class="fw-bold text-white mb-1">Belum ada transaksi</h5>
                                    <p class="text-secondary small mb-0">Anda belum melakukan pembelian layanan apapun.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

</body>
</html>