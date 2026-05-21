<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru - JasaKu</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="container-fluid p-0">
        <!-- Menggunakan h-100 dan overflow-hidden untuk memastikan pas 1 layar di desktop -->
        <div class="row g-0 vh-100 overflow-hidden">

            <!-- Sisi Kiri: Branding & Informasi -->
            <div class="col-lg-5 d-none d-lg-flex flex-column justify-content-between p-5 text-white position-relative" style="background-color: #0d2137;">
                
                <!-- Button Kembali -->
                <div class="position-absolute" style="top: 40px; left: 50px;">
                    <a href="javascript:history.back()" class="btn-back" style="color: rgba(255, 255, 255, 0.7); text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="mt-5 pt-4">
                    <!-- Logo Box Biru Terang -->
                    <div class="bg-primary d-inline-flex align-items-center justify-content-center rounded-3 p-3 mb-4 shadow-sm" style="background-color: #007bff !important;">
                        <i class="bi bi-lightning-fill fs-2 text-white"></i>
                    </div>

                    <h1 class="display-6 fw-bold mb-3">Akses Marketplace Jasa Terbaik.</h1>
                    <p class="opacity-75 mb-4">Masuk untuk terhubung dengan ribuan talenta profesional atau kelola pesanan jasa Anda dengan mudah.</p>

                    <!-- Fitur/Benefit -->
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-check-circle-fill text-primary" style="color: #007bff !important;"></i>
                            <span class="fw-medium">Transaksi Aman & Terproteksi</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-check-circle-fill text-primary" style="color: #007bff !important;"></i>
                            <span class="fw-medium">Kualitas Pengerjaan Profesional</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-check-circle-fill text-primary" style="color: #007bff !important;"></i>
                            <span class="fw-medium">Dukungan Pelanggan 24/7</span>
                        </div>
                    </div>
                </div>

                <div class="small opacity-50 mt-3">
                    &copy; 2024 JasaKu. Semua Hak Dilindungi.
                </div>
            </div>

            <!-- Sisi Kanan: Form Registrasi -->
            <div class="col-lg-7 col-12 d-flex align-items-center justify-content-center bg-white p-3 p-md-4 overflow-auto">
                <div class="w-100" style="max-width: 420px;">

                    <div class="mb-4 text-center text-lg-start">
                        <!-- Tampilkan Logo kecil hanya di mobile -->
                        <div class="bg-primary d-inline-flex d-lg-none align-items-center justify-content-center rounded-3 p-2 mb-2 shadow-sm" style="background-color: #007bff !important;">
                            <i class="bi bi-lightning-fill fs-4 text-white"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Selamat Datang!</h3>
                        <p class="text-muted small">Senang melihat Anda bergabung. Silakan isi formulir.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf 
                        <!-- Username -->
                        <div class="mb-2">
                            <label for="name" class="form-label fw-bold small text-dark mb-1">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 py-2 text-muted"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control form-control-md bg-light border-0 fs-6 shadow-none" id="name" name="name" placeholder="aell" required autofocus>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-2">
                            <label for="email" class="form-label fw-bold small text-dark mb-1">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 py-2 text-muted"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control form-control-md bg-light border-0 fs-6 shadow-none" id="email" name="email" placeholder="nama@email.com" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-2">
                            <label for="password" class="form-label fw-bold small text-dark mb-1">Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 py-2 text-muted"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control form-control-md bg-light border-0 fs-6 shadow-none" id="password" name="password" placeholder="********" required>
                            </div>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-bold small text-dark mb-1">Konfirmasi Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 py-2 text-muted"><i class="bi bi-shield-check"></i></span>
                                <input type="password" class="form-control form-control-md bg-light border-0 fs-6 shadow-none" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required>
                            </div>
                        </div>

                        <!-- Button Register -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-md py-2 fw-bold rounded-3 shadow-sm border-0 text-white" style="background-color: #0d2137;">
                                Daftar ke Akun
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3 mt-lg-4">
                        <p class="text-muted small mb-0">Sudah punya akun? <a href="/login" class="text-primary fw-bold text-decoration-none" style="color: #007bff !important;">Masuk Sekarang</a></p>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>