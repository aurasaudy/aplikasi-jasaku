<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - JasaKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="overflow-hidden vh-100 d-flex flex-column" style="font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8f9fa;">

    <div class="container-fluid p-0 d-flex flex-grow-1 overflow-hidden h-100">
        <div class="row g-0 w-100 h-100">

            <!-- SIDEBAR KIRI -->
            <nav class="col-lg-2 d-none d-lg-flex flex-column h-100 p-4 shadow" style="background-color: #0d2438;">
                <div class="d-flex align-items-center mb-5 ps-2">
                    <div class="bg-primary p-2 rounded-3 me-2">
                        <i class="bi bi-lightning-charge-fill text-white"></i>
                    </div>
                    <span class="h5 fw-bold m-0 text-white">JasaKu</span>
                </div>

                <div class="nav flex-column gap-2 flex-grow-1">
                    <a href="/beranda" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-house-door me-3"></i> Beranda
                    </a>
                    <a href="/profil" class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm text-decoration-none">
                        <i class="bi bi-person me-3"></i> Profil
                    </a>
                    <a href="/keranjang" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                    </a>
                </div>

                <div class="border-top border-secondary pt-3">
                    <div class="dropdown dropup">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="cursor: pointer;">
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;min-width:40px;">
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

            <!-- Offcanvas Mobile -->
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
                        <li><a href="/beranda" class="nav-link text-white-50 py-3 mb-2 text-decoration-none"><i class="bi bi-house-door-fill me-3"></i> Beranda</a></li>
                        <li><a href="/profil" class="nav-link active bg-primary py-3 mb-2 rounded-3 text-white text-decoration-none"><i class="bi bi-person me-3"></i> Profil</a></li>
                        <li><a href="/keranjang" class="nav-link text-white-50 py-3 mb-2 text-decoration-none"><i class="bi bi-box-seam me-3"></i> Keranjang</a></li>
                    </ul>
                    <div class="border-top border-secondary pt-3 mt-auto">
                        <div class="dropup">
                            <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none" data-bs-toggle="dropdown" style="cursor:pointer;">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;min-width:40px;">
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

            <!-- MAIN CONTENT -->
            <div class="col-12 col-lg-10 d-flex flex-column h-100 overflow-hidden">

                <!-- Navbar Mobile -->
                <div class="d-lg-none bg-white px-3 py-2 border-bottom d-flex justify-content-between align-items-center flex-shrink-0">
                    <button class="btn border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                        <i class="bi bi-list fs-2"></i>
                    </button>
                    <h5 class="fw-bold m-0 text-primary">JasaKu</h5>
                </div>
                
                <!-- Hero Section -->
                <div class="flex-shrink-0 py-4 px-4 px-md-5" style="background-color: #0d2438;">
                    <div class="d-flex align-items-center gap-3 gap-md-4">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:80px;height:80px;border:3px solid rgba(255,255,255,0.2);">
                            <i class="bi bi-person-circle text-dark" style="font-size:45px;"></i>
                        </div>
                        <div class="flex-grow-1 text-white">
                            <h4 class="fw-bold mb-0">{{ Auth::user()->name }}</h4>
                            <p class="mb-2 opacity-75 small"><i class="bi bi-envelope me-1"></i>{{ Auth::user()->email }}</p>
                            <!-- Di halaman profil.blade.php -->
                            <a href="/edit-biodata/{{ auth()->id() }}" class="btn btn-primary rounded-pill">
                                <i class="bi bi-pencil me-2"></i> Edit Biodata
                            </a>
                        </div>
                        <div class="d-none d-md-block flex-shrink-0">
                            <a href="/mulai_jual_jasa" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
                                <i class="bi bi-shop me-2"></i>Mulai Jual Jasa
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Card -->
                <div class="flex-grow-1 d-flex align-items-center px-4 px-md-5 py-3 overflow-hidden">
                    <div class="card border-0 shadow-sm rounded-4 w-100">
                        <div class="card-body p-4 p-md-5 text-center">
                            <h5 class="fw-bold mb-4 text-start">Aktivitas Anda</h5>
                            <div class="py-3">
                                <div class="mb-3 text-primary">
                                    <i class="bi bi-bag-check" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="fw-bold">Manajemen Pesanan</h4>
                                <p class="text-muted mb-4">Pantau semua transaksi dan layanan yang Anda pesan di sini.</p>
                                <div class="d-flex justify-content-center gap-3 flex-wrap">
                                    <a href="/rincian_pesanan" class="btn btn-dark rounded-pill px-4">Lihat Pesanan</a>
                                    <a href="/ulasan" class="btn btn-outline-dark rounded-pill px-4">Beri Ulasan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex-shrink-0 py-2 text-center border-top bg-white">
                    <small class="text-muted">
                        © 2026 JasaKu Indonesia • Versi 1.0.4
                    </small>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Mobile: izinkan scroll -->
    <script>
        if (window.innerWidth < 768) {
            document.body.classList.remove('overflow-hidden', 'vh-100');
            document.body.classList.add('overflow-auto', 'min-vh-100');
        }
    </script>

</body>

</html>