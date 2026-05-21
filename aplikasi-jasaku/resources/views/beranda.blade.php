<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - JasaKu</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- SIDEBAR KIRI (Hanya muncul di Desktop) -->
            <nav class="col-lg-2 d-none d-lg-flex flex-column sticky-top vh-100 p-4 shadow" style="background-color: #0d2438;">
                <div class="d-flex align-items-center mb-5 ps-2">
                    <div class="bg-primary p-2 rounded-3 me-2">
                        <i class="bi bi-lightning-charge-fill text-white"></i>
                    </div>
                    <span class="h5 fw-bold m-0 text-white">JasaKu</span>
                </div>

                <div class="nav flex-column gap-2 flex-grow-1">
                    <a href="/beranda" class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm text-decoration-none">
                        <i class="bi bi-house-door me-3"></i> Beranda
                    </a>
                    <a href="/profil" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-person me-3"></i> Profil
                    </a>
                    <a href="/keranjang" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                    </a>
                </div>

                <!-- Bagian Profil dengan Dropdown Log Out (Desktop) -->
                <div class="border-top border-secondary pt-3 mt-3">
                    <div class="dropdown">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="cursor: pointer; background-color: transparent;"
                            onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'"
                            onmouseout="this.style.backgroundColor='transparent'">

                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; min-width: 40px;">
                                <span class="fw-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                            <div class="overflow-hidden flex-grow-1">
                                <p class="text-white fw-bold mb-0 small text-truncate">{{ Auth::user()->name }}</p>
                            </div>
                            <i class="bi bi-three-dots-vertical text-white-50 ms-2 small"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-dark shadow border-secondary w-100 rounded-3 small">
                            <li><a class="dropdown-item py-2" href="/profil"><i class="bi bi-person me-2"></i> Detail Profil</a></li>
                            <li>
                                <hr class="dropdown-divider border-secondary">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2 text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Menu Offcanvas untuk Mobile -->
            <div class="offcanvas offcanvas-start text-white" tabindex="-1" id="mobileMenu" style="background-color: #0d2438; width: 280px;">
                <div class="offcanvas-header border-bottom border-secondary">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary p-2 rounded-3 me-2">
                            <i class="bi bi-lightning-charge-fill text-white"></i>
                        </div>
                        <h5 class="offcanvas-title fw-bold">JasaKu</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column">
                    <ul class="nav nav-pills flex-column flex-grow-1">
                        <li class="nav-item">
                            <a href="/beranda" class="nav-link active bg-primary py-3 mb-2 rounded-3 shadow-sm text-white text-decoration-none">
                                <i class="bi bi-house-door-fill me-3"></i> Beranda
                            </a>
                        </li>
                        <li>
                            <a href="/profil" class="nav-link text-white-50 py-3 mb-2 text-decoration-none">
                                <i class="bi bi-person me-3"></i> Profil
                            </a>
                        </li>
                        <li>
                            <a href="/keranjang" class="nav-link text-white-50 py-3 mb-2 text-decoration-none">
                                <i class="bi bi-box-seam me-3"></i> Keranjang
                            </a>
                        </li>
                    </ul>

                    <!-- Bagian Profil dengan Dropdown (Mobile) -->
                    <div class="border-top border-secondary pt-3 mt-auto">
                        <div class="dropup">
                            <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="cursor: pointer;"
                                onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'"
                                onmouseout="this.style.backgroundColor='transparent'">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; min-width: 40px;">
                                    <span class="fw-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                                <div class="overflow-hidden flex-grow-1 text-white">
                                    <p class="fw-bold mb-0 small text-truncate">{{ Auth::user()->name }}</p>
                                </div>
                                <i class="bi bi-chevron-up text-white-50 ms-2 small"></i>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-dark shadow border-secondary w-100 rounded-3 mb-2">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 text-danger fw-bold">
                                            <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten Utama -->
            <main class="col-lg-10 min-vh-100 d-flex flex-column bg-white">
                <!-- Header -->
                <header class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top px-3 px-md-4 py-3 shadow-sm">
                    <div class="container-fluid p-0">
                        <div class="d-flex align-items-center w-100 justify-content-between">
                            <div class="d-flex align-items-center">
                                <button class="btn border-0 me-2 d-lg-none p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                                    <i class="bi bi-list fs-2 text-dark"></i>
                                </button>
                                <h5 class="fw-bold m-0 text-dark d-none d-sm-block" style="font-size: 1.1rem;">Eksplorasi Jasa</h5>
                                <h5 class="fw-bold m-0 text-dark d-block d-sm-none" style="font-size: 1rem;">Eksplorasi</h5>
                            </div>
                            <div class="ms-auto">
                                <a href="/mulai_jual_jasa" class="btn btn-dark rounded-pill px-3 px-md-4 fw-bold shadow-sm" style="background-color: #0d2438; font-size: 0.85rem;">
                                    <i class="bi bi-plus-lg me-1"></i> Jual Jasa
                                </a>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Area Grid Jasa -->
                <div class="container-fluid p-3 p-md-5 flex-grow-1 bg-light">
                    <div class="mb-4 mb-md-5 text-center text-md-start">
                        <h3 class="fw-bold text-dark mb-1 fs-4 fs-md-2">Jasa Unggulan</h3>
                        <p class="text-secondary small">Temukan jasa terbaik sesuai kebutuhanmu.</p>
                    </div>

                    <div class="row row-cols-2 row-cols-md-2 row-cols-xl-4 g-2 g-md-4">
                        @foreach($jasa as $item)
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white shadow-hover">
                                <div class="ratio ratio-4x3 bg-secondary-subtle border-bottom">
                                    <div style="min-height:160px; overflow:hidden;">
                                        <img src="{{ asset('storage/' . $item->foto) }}"
                                            class="w-100 h-100 d-inline-block" style="object-fit: cover">
                                    </div>
                                </div>
                                <div class="card-body p-2 p-md-4 d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2 text-truncate">
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-2 shadow-sm fw-bold" style="width: 18px; height: 18px; min-width: 18px; font-size: 0.5rem;">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </div>
                                        <small class="fw-bold text-truncate" style="font-size: 0.7rem;">
                                            {{ Auth::user()->name }}
                                        </small>
                                    </div>
                                    <p class="card-title fw-bold text-dark mb-2 flex-grow-1" style="font-size: 0.8rem; line-height: 1.3;">
                                        {{ $item->nama_jasa }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center border-top pt-2 mt-auto">
                                        <div class="d-flex flex-column">
                                            <span class="text-secondary fw-bold" style="font-size: 0.5rem; letter-spacing: 0.5px;">MULAI</span>
                                            <span class="fw-bold text-primary" style="font-size: 0.85rem;">
                                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                    <a href="/spesifikasi_produk/{{ $item->id_jasa }}" class="btn btn-primary btn-sm rounded-pill w-100 fw-bold mt-2 py-1 py-md-2" style="font-size: 0.75rem;">
                                        Beli Jasa
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Footer -->
                <footer class="text-center py-4 border-top bg-white mt-auto">
                    <p class="text-muted mb-0 small opacity-75">© 2026 JasaKu Indonesia • Versi 1.0.4</p>
                </footer>
            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>