<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
{{-- ===================== CARA ORDER ===================== --}}
<section class="section" id="cara-order">
  <div class="section-header">
    <div class="section-title">Cara Order</div>
  </div>
  <div class="steps-grid">
    <div class="step-card">
      <span class="step-number">01</span>
      <div class="step-icon" style="background:rgba(56,189,248,0.08);"><i class="ti ti-click" style="color:#38bdf8;"></i></div>
      <h4>Pilih Layanan</h4>
      <p>Cari dan klik layanan premium yang kamu inginkan dari katalog kami.</p>
    </div>
    <div class="step-card">
      <span class="step-number">02</span>
      <div class="step-icon" style="background:rgba(56,189,248,0.14);"><i class="ti ti-package" style="color:#38bdf8;"></i></div>
      <h4>Pilih Paket & Bayar</h4>
      <p>Tentukan durasi paket, isi data, lalu bayar via QRIS, transfer, atau e-wallet.</p>
    </div>
    <div class="step-card">
      <span class="step-number">03</span>
      <div class="step-icon" style="background:rgba(56,189,248,0.2);"><i class="ti ti-rocket" style="color:#38bdf8;"></i></div>
      <h4>Akun Siap Dipakai</h4>
      <p>Akun langsung diproses dan dikirim ke WhatsApp kamu. Bergaransi penuh.</p>
    </div>
  </div>
</section>

{{-- ===================== STREAMING & MUSIC ===================== --}}
<section class="section" id="streaming">
  <div class="section-header">
    <div class="section-title">Streaming & Music</div>
    <a href="#streaming" class="see-all-link">Lihat semua →</a>
  </div>
  <div class="cards-grid">
@foreach($layanan as $l)
  @if($l->kategori == 'Streaming & Movies' || $l->kategori == 'Music & Audio')

    @if(session()->get('status') == 'admin')
      {{-- ADMIN: Flip Card --}}
      <div class="flip-wrapper service-card-shell">
        <div class="flip-inner" style="height:100%;">
          <div class="flip-front">
            <a href="/detailLayanan/{{ $l->id_layanan }}" class="service-card" style="height:100%;display:flex;flex-direction:column;">
              <div class="card-img-area">
                <img src="{{ asset('storage/' . $l->gambar_logo) }}" alt="{{ $l->nama_layanan }}" class="card-bg-img">
              </div>
              <div class="card-info">
                <div class="card-name">{{ $l->nama_layanan }}</div>
                @if($l->kategori == 'Music & Audio')
                  <span class="card-badge green">{{ $l->kategori }}</span>
                @else
                  <span class="card-badge">{{ $l->kategori }}</span>
                @endif
              </div>
            </a>
          </div>
          <div class="flip-back">
            <div class="flip-back-title">{{ $l->nama_layanan }}</div>
            
            <a href="/paket/tambah/{{ $l->id_layanan }}" class="btn-flip-tambah">
              <i class="ti ti-plus"></i> Tambah Paket
            </a>
            
            <a href="/show/{{ $l->id_layanan }}" class="btn-flip-edit">
              <i class="ti ti-edit"></i> Edit Layanan
            </a>
            
            <button type="button" class="btn-flip-hapus"
              onclick="if(confirm('Hapus {{ $l->nama_layanan }}?')) window.location='/hapus/{{ $l->id_layanan }}'">
              <i class="ti ti-trash"></i> Hapus
            </button>
          </div>
        </div>
      </div>

    @else
      {{-- USER / GUEST: Card Normal --}}
      <a href="/detailLayanan/{{ $l->id_layanan }}" class="service-card">
        <div class="card-img-area">
          <img src="{{ asset('storage/' . $l->gambar_logo) }}" alt="{{ $l->nama_layanan }}" class="card-bg-img">
        </div>
        <div class="card-info">
          <div class="card-name">{{ $l->nama_layanan }}</div>
          @if($l->kategori == 'Music & Audio')
            <span class="card-badge green">{{ $l->kategori }}</span>
          @else
            <span class="card-badge">{{ $l->kategori }}</span>
          @endif
        </div>
      </a>
    @endif

  @endif
@endforeach
  </div>
</section>


{{-- ===================== AI TOOLS ===================== --}}
<section class="section" id="aitools" style="padding-top:0;">
  <div class="section-header">
    <div class="section-title">AI Tools & Productivity</div>
    <a href="#aitools" class="see-all-link">Lihat semua →</a>
  </div>
  <div class="cards-grid">
    @foreach($layanan as $l)
  @if($l->kategori == 'AI & Productivity')

    @if(session()->get('status') == 'admin')
      {{-- ADMIN: Flip Card --}}
      <div class="flip-wrapper service-card-shell">
        <div class="flip-inner" style="height:100%;">
          <div class="flip-front">
            <a href="/detailLayanan/{{ $l->id_layanan }}" class="service-card" style="height:100%;display:flex;flex-direction:column;">
              <div class="card-img-area">
                <img src="{{ asset('storage/' . $l->gambar_logo) }}" alt="{{ $l->nama_layanan }}" class="card-bg-img">
              </div>
              <div class="card-info">
                <div class="card-name">{{ $l->nama_layanan }}</div>
                @if($l->kategori == 'Music & Audio')
                  <span class="card-badge green">{{ $l->kategori }}</span>
                @else
                  <span class="card-badge">{{ $l->kategori }}</span>
                @endif
              </div>
            </a>
          </div>
          <div class="flip-back">
            <div class="flip-back-title">{{ $l->nama_layanan }}</div>
            
            <a href="/paket/tambah/{{ $l->id_layanan }}" class="btn-flip-tambah">
              <i class="ti ti-plus"></i> Tambah Paket
            </a>
            
            <a href="/show/{{ $l->id_layanan }}" class="btn-flip-edit">
              <i class="ti ti-edit"></i> Edit Layanan
            </a>
            
            <button type="button" class="btn-flip-hapus"
              onclick="if(confirm('Hapus {{ $l->nama_layanan }}?')) window.location='/hapus/{{ $l->id_layanan }}'">
              <i class="ti ti-trash"></i> Hapus
            </button>
          </div>
        </div>
      </div>

    @else
      {{-- USER / GUEST: Card Normal --}}
      <a href="/detailLayanan/{{ $l->id_layanan }}" class="service-card">
        <div class="card-img-area">
          <img src="{{ asset('storage/' . $l->gambar_logo) }}" alt="{{ $l->nama_layanan }}" class="card-bg-img">
        </div>
        <div class="card-info">
          <div class="card-name">{{ $l->nama_layanan }}</div>
          @if($l->kategori == 'Music & Audio')
            <span class="card-badge green">{{ $l->kategori }}</span>
          @else
            <span class="card-badge">{{ $l->kategori }}</span>
          @endif
        </div>
      </a>
    @endif

  @endif
@endforeach
  </div>
</section>

{{-- ===================== SOCIAL PROOF ===================== --}}
<div class="promo-section">
  <div class="promo-banner">
    <div class="promo-glow"></div>
    <div class="promo-text">
      <h3>Dipercaya <span>ribuan pelanggan</span></h3>
      <p>Garansi penuh, proses cepat, dan layanan yang konsisten sejak hari pertama.</p>
    </div>
    <div class="trust-stats">
      <div class="trust-stat-item">
        <div class="trust-stat-num">2.500+</div>
        <div class="trust-stat-label">Pesanan Selesai</div>
      </div>
      <div class="trust-stat-item">
        <div class="trust-stat-num">4.9<span>/5</span></div>
        <div class="trust-stat-label">Rating Pelanggan</div>
      </div>
      <div class="trust-stat-item">
        <div class="trust-stat-num">1×24</div>
        <div class="trust-stat-label">Jam Garansi</div>
      </div>
    </div>
  </div>
</div>

{{-- ===================== VIDEO SECTION ===================== --}}
<div class="video-section">
  <div class="video-section-inner">

    <div class="video-section-header">
      <div>
        <div class="video-section-title">Preview Layanan SUBLY</div>
        <div class="video-section-subtitle">Tonton bagaimana SUBLY bekerja untuk kamu</div>
      </div>
    </div>

    <div class="video-section-body" id="videoBody">
      <video id="mainVid" preload="metadata">
        <source src="{{ asset('videos/Video_Subly.mp4') }}" type="video/mp4">
      </video>
      <div class="video-section-overlay" id="videoOverlay">
        <div class="play-ring">
          <div class="play-btn-center">
            <i class="ti ti-player-play"></i>
          </div>
        </div>
        <div class="video-play-label">Klik untuk memutar video</div>
      </div>
    </div>

    <div class="video-section-footer">
      <div class="video-section-footer-info">
        <span><i class="ti ti-shield-check"></i> Aman & Terpercaya</span>
        <span><i class="ti ti-bolt"></i> Proses Instan</span>
        <span><i class="ti ti-headset"></i> CS 24/7</span>
      </div>
      <div style="font-size:11px;color:#1e3a5f;font-weight:600;letter-spacing:0.5px;">SUBLY © 2026</div>
    </div>

  </div>
</div>

</div>