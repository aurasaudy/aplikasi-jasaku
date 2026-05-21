<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - JasaKu</title>
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
           <!-- SIDEBAR KIRI (Desktop Only) -->
            <nav class="col-lg-2 d-none d-lg-flex flex-column sticky-top vh-100 p-4 shadow" style="background-color: #0d2438;">
                <div class="d-flex align-items-center mb-5 ps-2">
                    <div class="bg-primary p-2 rounded-3 me-2">
                        <i class="bi bi-lightning-charge-fill text-white"></i>
                    </div>
                    <span class="h5 fw-bold m-0 text-white">JasaKu</span>
                </div>
                
                <div class="nav flex-column gap-2">
                    <a href="/berandalogin" class="nav-link text-white-50 p-3 rounded-4 small fw-medium">
                        <i class="bi bi-house-door me-3"></i> Beranda
                    </a>
                    <a href="/profillogin" class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm">
                        <i class="bi bi-person me-3"></i> Profil
                    </a>
                    <a href="/login" class="nav-link text-white-50 p-3 rounded-4 small fw-medium">
                        <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                    </a>
                </div>
            </nav>

            <!-- Konten Utama -->
            <main class="col-lg-10 flex-grow-1 min-vh-100 d-flex flex-column bg-white">
                
                <!-- Navbar Mobile Header -->
                <header class="navbar navbar-light bg-white border-bottom d-lg-none px-3 py-3 shadow-sm sticky-top">
                    <button class="btn border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                        <i class="bi bi-list fs-1 text-dark"></i>
                    </button>
                    <span class="fw-bold h5 m-0">Profil Saya</span>
                    <div style="width: 32px;"></div>
                </header>

                <!-- Profile Hero Header (Bagian Atas Lebih Besar) -->
                <div class="py-5 px-4 px-md-5" style="background: linear-gradient(135deg, #0d2438 0%, #1a4a75 100%);">
                    <div class="container-fluid">
                        <div class="row align-items-center g-4">
                            <div class="col-12 col-md-auto text-center">
                                <div class="bg-white rounded-circle p-1 shadow d-inline-block">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                        <i class="bi bi-person-fill text-secondary display-3"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md text-center text-md-start">
                                <h2 class="text-white fw-bold mb-1">Tamu JasaKu</h2>
                                <p class="text-white opacity-75 mb-3">Selamat datang! Masuk untuk mulai bertransaksi.</p>
                                <a href="/login" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow">
                                    MASUK SEKARANG
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Content Body (Pas untuk Dashboard) -->
                <div class="container-fluid px-3 px-md-5 py-4 flex-grow-1 bg-light">
                    <div class="row justify-content-center">
                        <div class="col-12" style="max-width: 900px;">
                            
                            <!-- Activity Card (Ringkas) -->
                            <div class="card border-0 rounded-4 shadow-sm bg-white overflow-hidden">
                                <div class="card-header bg-white border-0 py-3 px-4 d-flex align-items-center justify-content-between">
                                    <h6 class="fw-bold m-0 text-dark">
                                        <i class="bi bi-clock-history me-2 text-primary"></i>Aktivitas Terbaru
                                    </h6>
                                    <span class="badge bg-light text-muted border px-3 rounded-pill">Guest</span>
                                </div>
                                <div class="card-body p-4 pt-0">
                                    <div class="bg-light rounded-4 p-4 text-center border">
                                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm mx-auto mb-3" style="width: 60px; height: 60px;">
                                            <i class="bi bi-lock-fill text-primary fs-3"></i>
                                        </div>
                                        <h6 class="fw-bold text-dark">Layanan Belum Tersedia</h6>
                                        <p class="text-muted small mb-0 mx-auto" style="max-width: 400px;">
                                            Silakan login untuk mengakses fitur pesanan, keranjang belanja, dan ulasan jasa.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="text-center py-3 border-top bg-white mt-auto">
                    <p class="text-muted mb-0 small opacity-75">© 2026 JasaKu Indonesia • Versi 1.0.4</p>
                </footer>
            </main>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS Bundle (Tetap ada untuk fungsi Offcanvas menu mobile) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>