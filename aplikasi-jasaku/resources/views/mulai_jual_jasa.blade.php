<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Jasa - JasaKu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="container-fluid p-0">
        <div class="row g-0">

            <!-- SIDEBAR KIRI (Desktop Only) -->
            <nav class="col-lg-2 d-none d-lg-flex flex-column sticky-top vh-100 p-4 shadow" style="background-color: #0d2438;">
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
                    <a href="/profil" class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm">
                        <i class="bi bi-person me-3"></i> Profil
                    </a>
                    <a href="/keranjang" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                    </a>
                </div>

                <!-- POJOK KIRI BAWAH: Profil & Logout (Desktop) -->
                <div class="border-top border-secondary pt-3 mt-auto">
                    <div class="dropdown">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none" 
                             data-bs-toggle="dropdown" 
                             aria-expanded="false" 
                             style="cursor: pointer;"
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
                            <li><a class="dropdown-item py-2" href="/profillogin"><i class="bi bi-person me-2"></i> Detail Profil</a></li>
                            <li><hr class="dropdown-divider border-secondary"></li>
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

            <!-- Offcanvas Menu Mobile -->
            <div class="offcanvas offcanvas-start text-white" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="background-color: #0d2438 !important; width: 280px;">
                <div class="offcanvas-header border-bottom border-secondary p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary p-2 rounded-3 me-2">
                            <i class="bi bi-lightning-charge-fill text-white"></i>
                        </div>
                        <h5 class="offcanvas-title fw-bold" id="mobileMenuLabel">JasaKu</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-4 d-flex flex-column">
                    <div class="nav flex-column gap-2 flex-grow-1">
                        <a href="/beranda" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                            <i class="bi bi-house-door me-3"></i> Beranda
                        </a>
                        <a href="/profil" class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm">
                            <i class="bi bi-person me-3"></i> Profil
                        </a>
                        <a href="/keranjang" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                            <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                        </a>
                    </div>

                    <!-- Profil & Logout (Mobile) -->
                    <div class="border-top border-secondary pt-3 mt-auto">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                <span class="fw-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">{{ Auth::user()->name }}</h6>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100 rounded-pill fw-bold small">
                                <i class="bi bi-box-arrow-right me-2"></i> Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <main class="col-lg-10 flex-grow-1 min-vh-100 d-flex flex-column overflow-hidden">

                <!-- Header -->
                <header class="text-white px-3 px-md-5 py-3 d-flex align-items-center justify-content-between border-bottom border-secondary border-opacity-25 shadow-sm" style="background-color:#0d2438; min-height: 80px;">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-link text-white d-lg-none p-0 me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                            <i class="bi bi-list fs-1"></i>
                        </button>
                        <div class="lh-sm">
                            <h2 class="h5 fw-bold m-0 text-white">Manajemen</h2>
                            <p class="text-secondary small mb-0 d-none d-sm-block mt-1">Kelola jasa profesional anda</p>
                        </div>
                    </div>

                    <a href="/profil" class="btn btn-primary fw-bold rounded-pill px-3 py-2 d-flex align-items-center gap-2 shadow-sm border-0" style="font-size: 0.8rem;">
                        <i class="bi bi-arrow-left"></i>
                        <span class="text-uppercase">Kembali ke Profil</span>
                    </a>
                </header>

                <!-- Content Area -->
                <div class="p-3 p-md-4 flex-grow-1 overflow-auto">
                    <div class="row g-3">

                        @foreach($jasa as $item)
                        <!-- Card Jasa Dinamis -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="card border-0 rounded-4 shadow-sm h-100 overflow-hidden"
                                style="transition: transform 0.2s ease;"
                                onmouseover="this.style.transform='translateY(-4px)'"
                                onmouseout="this.style.transform='translateY(0)'">

                                <div style="height:180px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                        class="w-100 h-100" style="object-fit: cover" onerror="this.src='https://placehold.co/600x400?text=No+Image'">
                                </div>

                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-primary bg-opacity-10 text-primary fw-bold text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.05em;">
                                            {{ $item->kategori ?? 'Jasa' }}
                                        </span>
                                        <h5 class="fw-bold m-0 text-dark" style="font-size: 0.9rem;">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </h5>
                                    </div>

                                    <h4 class="h6 fw-bold text-dark mb-2 text-truncate">{{ $item->nama_jasa }}</h4>

                                    <p class="text-muted mb-4" style="font-size: 0.8rem; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $item->deskripsi }}
                                    </p>

                                    <div class="d-flex gap-2">
                                        <a href="/edit-jasa/{{ $item->id_jasa }}" class="btn btn-light border flex-grow-1 rounded-pill fw-bold py-2 shadow-sm" style="font-size: 0.8rem;">
                                            Edit Jasa
                                        </a>

                                        <form action="/delete-jasa/{{ $item->id_jasa }}" method="POST" onsubmit="return confirm('Yakin mau menghapus data {{ $item->nama_jasa }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        @endforeach

                        <!-- Placeholder Tambah Baru -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <a href="/tambah" class="text-decoration-none h-100">
                                <div class="card border-2 border-primary border-opacity-25 rounded-4 h-100 d-flex flex-column align-items-center justify-content-center bg-white py-5 shadow-sm"
                                    style="border-style: dashed; cursor: pointer; min-height: 300px;">
                                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle mb-3">
                                        <i class="bi bi-plus-lg text-primary fs-3"></i>
                                    </div>
                                    <span class="fw-bold text-primary">Tambah Jasa Baru</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Footer -->
                <footer class="text-center py-4 border-top bg-white mt-auto">
                    <p class="text-muted mb-0 small opacity-75">© 2026 JasaKu Indonesia • Versi 1.0.4</p>
                </footer>

            </main>
        </div>
    </div>

    <!-- Bootstrap 5.3.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>