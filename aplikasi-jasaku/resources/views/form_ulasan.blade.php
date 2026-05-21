<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Ulasan - JasaKu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <!-- NAVBAR MOBILE -->
    <nav class="navbar navbar-dark d-lg-none shadow-sm p-3" style="background-color: #0d2438;">
        <div class="container-fluid">
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu">
                <i class="bi bi-list fs-3 text-white"></i>
            </button>
            <div class="d-flex align-items-center">
                <div class="bg-primary p-1 rounded-2 me-2">
                    <i class="bi bi-lightning-charge-fill text-white small"></i>
                </div>
                <span class="h6 fw-bold m-0 text-white">JasaKu</span>
            </div>
            <div style="width: 40px;"></div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        <div class="row g-0">

            <!-- SIDEBAR KIRI (Data Profil Menggunakan Auth) -->
            <nav class="col-lg-2 d-none d-lg-flex flex-column sticky-top vh-100 p-4 shadow"
                style="background-color: #0d2438;">
                <div class="d-flex align-items-center mb-5 ps-2">
                    <div class="bg-primary p-2 rounded-3 me-2">
                        <i class="bi bi-lightning-charge-fill text-white"></i>
                    </div>
                    <span class="h5 fw-bold m-0 text-white">JasaKu</span>
                </div>

                <div class="nav flex-column gap-2 flex-grow-1">
                    <a href="/beranda"
                        class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-house-door me-3"></i> Beranda
                    </a>
                    <a href="/profil"
                        class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm text-decoration-none">
                        <i class="bi bi-person me-3"></i> Profil
                    </a>
                    <a href="/keranjang"
                        class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                    </a>
                </div>

                <!-- Bagian Profil (Dinamis Auth) -->
                <div class="border-top border-secondary pt-3 mt-3">
                    <div class="dropdown">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none text-decoration-none"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="cursor: pointer; background-color: transparent;"
                            onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'"
                            onmouseout="this.style.backgroundColor='transparent'">

                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 40px; height: 40px; min-width: 40px;">
                                <span class="fw-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                            <div class="overflow-hidden flex-grow-1">
                                <p class="text-white fw-bold mb-0 small text-truncate">{{ Auth::user()->name }}</p>
                            </div>
                            <i class="bi bi-three-dots-vertical text-white-50 ms-2 small"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-dark shadow border-secondary w-100 rounded-3 small">
                            <li><a class="dropdown-item py-2" href="/profil"><i class="bi bi-person me-2"></i> Detail
                                    Profil</a></li>
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

            <!-- Menu Offcanvas Mobile (Data Profil Menggunakan Auth) -->
            <div class="offcanvas offcanvas-start text-white" tabindex="-1" id="mobileMenu"
                style="background-color: #0d2438; width: 280px;">
                <div class="offcanvas-header border-bottom border-secondary">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary p-2 rounded-3 me-2">
                            <i class="bi bi-lightning-charge-fill text-white"></i>
                        </div>
                        <h5 class="offcanvas-title fw-bold">JasaKu</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white shadow-none"
                        data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column p-0">
                    <ul class="nav nav-pills flex-column flex-grow-1 p-3">
                        <li class="nav-item"><a href="/beranda"
                                class="nav-link text-white-50 py-3 mb-2 text-decoration-none"><i
                                    class="bi bi-house-door me-3"></i> Beranda</a></li>
                        <li><a href="/profil" class="nav-link text-white-50 py-3 mb-2 text-decoration-none"><i
                                    class="bi bi-person me-3"></i> Profil</a></li>
                        <li><a href="/keranjang" class="nav-link text-white-50 py-3 mb-2 text-decoration-none"><i
                                    class="bi bi-box-seam me-3"></i> Keranjang</a></li>
                        <li><a href="/ulasan"
                                class="nav-link active bg-primary text-white py-3 mb-2 rounded-3 text-decoration-none"><i
                                    class="bi bi-chat-left-text me-3"></i> Ulasan</a></li>
                    </ul>

                    <div class="border-top border-secondary pt-3 mt-auto p-3">
                        <div class="dropup">
                            <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none"
                                data-bs-toggle="dropdown">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 40px; height: 40px;">
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
                                        <button type="submit" class="dropdown-item py-2 text-danger fw-bold"><i
                                                class="bi bi-box-arrow-right me-2"></i> Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KONTEN UTAMA -->
            <div class="col-12 col-lg-10 d-flex flex-column min-vh-100">
                <main class="p-3 p-md-4 p-lg-5 flex-grow-1">

                    <div class="mb-5 text-center text-md-start">
                        <a href="/rincian_pesanan"
                            class="btn btn-link text-decoration-none p-0 mb-3 text-muted small fw-bold">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Pesanan
                        </a>
                        <h2 class="fw-bold h4 text-dark">Beri Ulasan Jasa</h2>
                        <p class="text-muted small">Bagikan pengalaman Anda menggunakan jasa ini</p>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-8">

                            <!-- Perhatikan form action dan penambahan input hidden -->
                            <form action="/simpan-ulasan" method="POST">
                                @csrf
                                <!-- ID Jasa dikirim secara tersembunyi agar sistem tahu jasa mana yang diulas -->
                                <input type="hidden" name="id_jasa" value="{{ $jasa->id_jasa }}">

                                <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                                    <div class="card-body p-4 d-flex align-items-center gap-4">
                                        <div class="bg-light rounded-4 d-flex align-items-center justify-content-center border"
                                            style="width: 80px; height: 80px; min-width: 80px;">
                                            @if ($jasa->foto)
                                                <img src="{{ asset('storage/' . $jasa->foto) }}"
                                                    class="img-fluid rounded-4" alt="Jasa">
                                            @else
                                                <i class="bi bi-image text-secondary opacity-25 fs-2"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <h5 class="fw-bold mb-1 text-dark">{{ $jasa->nama_jasa }}</h5>
                                            <p class="text-muted small mb-0 fw-medium">Kategori:
                                                {{ $jasa->kategori_jasa }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-sm rounded-4 mb-5">
                                    <div class="card-body p-4 p-md-5">
                                        <div class="mb-4">
                                            <label class="form-label fw-bold text-dark mb-3">Tulis Ulasan</label>
                                            <!-- Nama name="ulasan" disamakan dengan controller -->
                                            <textarea name="ulasan" class="form-control rounded-4 shadow-none border-2 p-4 bg-light bg-opacity-25"
                                                rows="7" required placeholder="Apa yang Anda suka dari jasa ini? Bagaimana kualitas pengerjaannya?"></textarea>
                                        </div>

                                        <div class="d-grid mt-5">
                                            <button type="submit"
                                                class="btn btn-primary rounded-pill py-3 fw-bold shadow-sm">Kirim
                                                Ulasan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </main>

                <footer class="text-center py-4 border-top bg-white mt-auto">
                    <p class="text-muted mb-0 small opacity-75">© 2026 JasaKu Indonesia • Versi 1.0.4</p>
                </footer>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5.3.2 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>