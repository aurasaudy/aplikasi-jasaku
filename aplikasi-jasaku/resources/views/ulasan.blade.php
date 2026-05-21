<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Saya - JasaKu</title>
    <!-- Bootstrap 5.3.2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-3 shadow-sm" style="background-color: #0d2438;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <div class="bg-primary p-2 rounded-3 me-2 shadow-sm">
                    <i class="bi bi-lightning-charge-fill text-white"></i>
                </div>
                <span class="h5 fw-bold m-0 text-white">JasaKu</span>
            </a>
            <div class="ms-auto">
                <a href="/profil" class="btn btn-link text-white text-decoration-none btn-sm fw-bold">
                    <i class="bi bi-arrow-left-circle me-2"></i>Kembali ke Profil
                </a>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <header class="bg-white border-bottom py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-8 text-center text-md-start">
                    <h1 class="display-6 fw-bold text-dark mb-2">Riwayat Ulasan</h1>
                    <p class="text-muted mb-0">Lihat semua apresiasi yang telah Anda berikan kepada mitra kami.</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <div class="d-inline-flex flex-column align-items-center align-items-md-end gap-3">
                        <!-- BOX TOTAL ULASAN -->
                        <div class="bg-primary bg-opacity-10 p-4 rounded-4 border border-primary border-opacity-10">
                            <h2 class="fw-bold text-primary mb-0">{{ $dataUlasan->count() }}</h2>
                            <p class="small text-primary fw-bold text-uppercase mb-0 mt-1 opacity-75">Ulasan Terkirim</p>
                        </div>

                        @if ($jasa->count() > 0)
                            <a href="{{ url('/form_ulasan/' . $jasa->first()->id_jasa) }}"
                                class="btn btn-primary btn-lg fw-bold rounded-pill px-5 py-3 shadow-sm">
                                <i class="bi bi-pencil-square me-2"></i> Beri Ulasan
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                
                <div class="row g-4">
                    @forelse($dataUlasan as $ulasan)
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-4 border-start border-primary border-4 mb-3">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <!-- Inisial Nama -->
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                                            <span class="fw-bold">{{ strtoupper(substr($ulasan->username, 0, 1)) }}</span>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-0 text-dark">{{ $ulasan->username }}</h6>
                                            <!-- Menampilkan Nama Jasa jika ada, atau ID Jasa -->
                                            <small class="text-muted small">
                                                <i class="bi bi-tag me-1"></i> {{ $ulasan->nama_jasa ?? 'Jasa #' . $ulasan->id_jasa }}
                                            </small>
                                        </div>
                                    </div>

                                    <!-- Isi Ulasan -->
                                    <div class="p-3 bg-light rounded-3 border-start border-3">
                                        <p class="mb-0 text-secondary" style="font-style: italic;">
                                            <i class="bi bi-chat-left-quote-fill me-2 opacity-50"></i>
                                            {{ $ulasan->ulasan }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-chat-dots text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">Anda belum pernah memberikan ulasan.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <p class="text-muted mb-0 small opacity-75">
                <span class="fw-bold">© 2026 JasaKu Indonesia</span> • Versi 1.0.4
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>