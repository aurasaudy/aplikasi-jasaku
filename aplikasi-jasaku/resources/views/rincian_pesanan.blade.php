<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - JasaKu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <!-- Navbar -->
    <nav class="navbar navbar-dark py-3 shadow-sm sticky-top" style="background-color: #0d2438;">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="profile.html">
                <i class="bi bi-lightning-charge-fill text-primary"></i> JasaKu
            </a>
            <a href="/profil" class="btn btn-outline-light rounded-pill btn-sm px-4 fw-bold border-0">
                <i class="bi bi-arrow-left me-1"></i> Profil
            </a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="d-flex align-items-center justify-content-between mb-5">
                    <div>
                        <h2 class="fw-bolder text-dark m-0" style="letter-spacing: -1px; font-size: 32px;">Daftar Pesanan</h2>
                        <p class="text-muted small m-0">Pantau semua progres jasa yang Anda pesan.</p>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-white bg-white border border-light-subtle rounded-pill px-4 fw-semibold shadow-sm dropdown-toggle" data-bs-toggle="dropdown">
                            Semua Status
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 p-2">
                            <li><a class="dropdown-item rounded-3" href="#">Aktif</a></li>
                            <li><a class="dropdown-item rounded-3" href="#">Selesai</a></li>
                            <li><a class="dropdown-item rounded-3" href="#">Dibatalkan</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Order Item Card -->
                @forelse($jasa as $item)
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 40px;">
                    <div class="card-body p-4 p-md-5">
                        <div class="row align-items-center g-4">
                            <!-- Bagian Gambar -->
                            <div class="col-md-3 col-lg-2">
                                <div class="ratio ratio-1x1 bg-light shadow-sm border border-light-subtle overflow-hidden" style="border-radius: 25px;">
                                    @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" class="w-100 h-100" style="object-fit: cover;">
                                    @else
                                    <div class="d-flex align-items-center justify-content-center h-100">
                                        <i class="bi bi-palette text-muted fs-1"></i>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Bagian Info -->
                            <div class="col-md-6 col-lg-7 px-md-4">
                                <h3 class="fw-bold text-dark mb-1" style="font-size: 24px;">{{ $item->nama_jasa }}</h3>
                                <p class="mb-1 text-secondary" style="font-size: 15px;">
                                    Kategori: <span class="fw-bold text-dark">{{ $item->kategori_jasa ?? '-' }}</span>
                                </p>
                                <p class="mb-0 text-secondary" style="font-size: 15px;">
                                    Harga: <span class="fw-bold text-primary text-opacity-75">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                </p>
                            </div>

                            <!-- Bagian Aksi -->
                            <div class="col-md-3 col-lg-3 text-center">
                                <div class="d-grid gap-2">
                                    <a href="{{ url('/form_ulasan/' . $item->id_jasa) }}" class="btn text-white rounded-pill py-2 px-4 fw-bold shadow-sm" style="background-color: #0d2438;">
                                        Beri Ulasan
                                    </a>
                                    <a href="{{ url('/invoice') }}" class="btn btn-link text-decoration-none text-secondary fw-semibold small mt-1 hover-dark">
                                        Lihat Invoice
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Tampilan Kosong -->
                <div class="text-center py-5 text-muted">
                    <div class="bg-white d-inline-block p-4 rounded-circle mb-3 shadow-sm">
                        <i class="bi bi-inbox fs-1 text-secondary opacity-50"></i>
                    </div>
                    <p class="fw-medium">Belum ada pesanan saat ini.</p>
                    <a href="/beranda" class="btn btn-primary rounded-pill px-4 fw-bold shadow">Jelajahi Jasa</a>
                </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4 bg-white border-top mt-auto">
        <div class="container text-center">
            <p class="text-muted mb-0 small opacity-75">© 2026 JasaKu Indonesia • Versi 1.0.4</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>