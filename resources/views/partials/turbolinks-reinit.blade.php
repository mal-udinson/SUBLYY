<script>

// ============================================================
//  GLOBAL STATE — didefinisikan SEKALI saat script pertama load,
//  TIDAK boleh didefinisikan ulang di dalam turbolinks:load
// ============================================================
let navbarScrollHandlerAttached = false;
let currentRevealObserver = null;

// ------------------------------------------------------------
// Navbar scroll effect — pasang listener cuma sekali (dijaga flag)
// ------------------------------------------------------------
function attachNavbarScrollHandler() {
  if (navbarScrollHandlerAttached) return; // cegah duplikat listener
  const navbar = document.getElementById('mainNavbar');
  if (!navbar) return;

  function handleScroll() {
    if (window.scrollY > 60) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }

  window.addEventListener('scroll', handleScroll);
  handleScroll(); // langsung jalankan sekali biar state awal benar
  navbarScrollHandlerAttached = true;
}

// ------------------------------------------------------------
// Scroll-reveal animation — disconnect observer lama sebelum bikin baru
// ------------------------------------------------------------
function reinitRevealAnimations() {
  if (currentRevealObserver) {
    currentRevealObserver.disconnect(); // matikan observer lama dulu
  }

  document.querySelectorAll('.reveal').forEach(el => el.classList.remove('visible'));

  currentRevealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        currentRevealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.reveal').forEach(el => currentRevealObserver.observe(el));
}

// ------------------------------------------------------------
// Carousel — dispose instance lama sebelum bikin baru
// ------------------------------------------------------------
function reinitCarousels() {
  document.querySelectorAll('.carousel').forEach(el => {
    const existing = bootstrap.Carousel.getInstance(el);
    if (existing) existing.dispose();
    new bootstrap.Carousel(el, { interval: 4000, ride: 'carousel' });
  });
}

// ------------------------------------------------------------
// Dropdown — dispose instance lama sebelum bikin baru
// ------------------------------------------------------------
function reinitDropdowns() {
  document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(el => {
    const existing = bootstrap.Dropdown.getInstance(el);
    if (existing) existing.dispose();
    new bootstrap.Dropdown(el);
  });
}

// ------------------------------------------------------------
// Modal — dispose instance lama sebelum bikin baru
// ------------------------------------------------------------
function reinitModals() {
  document.querySelectorAll('[data-bs-toggle="modal"]').forEach(el => {
    const targetSelector = el.getAttribute('data-bs-target');
    if (!targetSelector) return;
    const targetEl = document.querySelector(targetSelector);
    if (!targetEl) return;
    const existing = bootstrap.Modal.getInstance(targetEl);
    if (existing) existing.dispose();
    new bootstrap.Modal(targetEl);
  });
}

// ============================================================
//  EVENT DELEGATION — dipasang SEKALI saja, di luar turbolinks:load.
//  Pakai delegation supaya tidak perlu re-attach setiap partial load,
//  dan tidak perlu cloneNode (yang jadi sumber listener menumpuk).
// ============================================================
document.addEventListener('click', function (e) {
  const videoBody = e.target.closest('#videoBody');
  if (!videoBody) return;

  const vid = document.getElementById('mainVid');
  const overlay = document.getElementById('videoOverlay');
  if (!vid || !overlay) return;

  if (vid.paused) {
    vid.play();
    overlay.classList.add('hidden');
  } else {
    vid.pause();
    overlay.classList.remove('hidden');
  }
});

// ============================================================
//  TURBOLINKS LOAD — dipanggil setiap kali halaman/partial baru dimuat
// ============================================================
document.addEventListener('turbolinks:load', function () {
  reinitDropdowns();
  reinitCarousels();
  reinitModals();
  reinitRevealAnimations();
  attachNavbarScrollHandler(); // aman, tidak akan dobel karena flag
});

</script>