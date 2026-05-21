<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JasaKu</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-white" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100 overflow-hidden">
            
            <!-- SISI KIRI: HERO INFO (Hanya muncul di Desktop lg ke atas) -->
            <div class="col-lg-5 d-none d-lg-flex flex-column justify-content-between p-5 position-relative text-white" style="background-color: #0d2438;">
                
                <!-- Atas: Tombol Kembali & Logo -->
                <div class="mb-4">
                    <a href="/berandalogin" class="text-white text-decoration-none d-flex align-items-center gap-2 small opacity-75 mb-4">
                        <i class="bi bi-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                    <!-- Logo -->
                    <div class="bg-primary p-2 rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-lightning-charge-fill text-white fs-4"></i>
                    </div>
                </div>

                <!-- Tengah: Konten Utama -->
                <div class="pe-xl-5">
                    <!-- Ukuran teks dikurangi dari display-4 ke h1 agar tidak menabrak -->
                    <h1 class="fw-800 mb-3" style="font-weight: 800; line-height: 1.2; font-size: 2.8rem;">Akses Marketplace Jasa Terbaik.</h1>
                    <p class="opacity-75 mb-4" style="max-width: 90%;">Masuk untuk terhubung dengan ribuan talenta profesional atau kelola pesanan jasa Anda dengan mudah.</p>

                    <div class="d-flex flex-column gap-3 mb-5">
                        <div class="d-flex align-items-center fw-semibold">
                            <i class="bi bi-check-circle-fill text-primary me-3 fs-5"></i> Transaksi Aman & Terproteksi
                        </div>
                        <div class="d-flex align-items-center fw-semibold">
                            <i class="bi bi-check-circle-fill text-primary me-3 fs-5"></i> Kualitas Pengerjaan Profesional
                        </div>
                        <div class="d-flex align-items-center fw-semibold">
                            <i class="bi bi-check-circle-fill text-primary me-3 fs-5"></i> Dukungan Pelanggan 24/7
                        </div>
                    </div>
                </div>

                <!-- Bawah: Copyright -->
                <div class="opacity-50 small">
                    © 2024 JasaKu. Semua Hak Dilindungi.
                </div>
            </div>

            <!-- SISI KANAN: FORM LOGIN -->
            <div class="col-lg-7 d-flex align-items-center justify-content-center p-4 p-md-5 overflow-auto">
                <div class="w-100" style="max-width: 400px;">
                    
                    <!-- Mobile Logo & Back Button (Hanya muncul di Mobile) -->
                    <div class="d-lg-none mb-4">
                        <div class="d-flex justify-content-start mb-4">
                            <a href="/berandalogin" class="text-dark text-decoration-none d-flex align-items-center gap-2 small opacity-75">
                                <i class="bi bi-arrow-left"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                        <div class="text-center">
                            <div class="bg-primary p-2 rounded-3 d-inline-flex align-items-center justify-content-center mb-3" style="width: 42px; height: 42px;">
                                <i class="bi bi-lightning-charge-fill text-white fs-5"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5 text-center text-lg-start">
                        <h2 class="fw-800 text-dark" style="font-weight: 800;">Selamat Datang!</h2>
                        <p class="text-secondary">Senang melihat Anda kembali. Silakan masuk.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-dark">Email atau Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start-3 px-3">
                                    <i class="bi bi-person text-secondary"></i>
                                </span>
                                <input type="email" name="email" 
                                       class="form-control bg-light border-0 rounded-end-3 py-3 @error('email') is-invalid @enderror" 
                                       placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label small fw-bold text-dark mb-0">Kata Sandi</label>
                                <a href="{{ route('password.request') }}" class="text-decoration-none small fw-bold text-primary">Lupa sandi?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start-3 px-3">
                                    <i class="bi bi-lock text-secondary"></i>
                                </span>
                                <input type="password" name="password" 
                                       class="form-control bg-light border-0 rounded-end-3 py-3 @error('password') is-invalid @enderror" 
                                       placeholder="••••••••" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-4">
                            <input class="form-check-input shadow-none" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label small text-secondary" for="remember">
                                Biarkan saya tetap masuk
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn w-100 py-3 rounded-3 fw-bold text-white mb-4 shadow-sm" style="background-color: #0d2438;">
                            Masuk ke Akun
                        </button>

                        <div class="text-center mt-4">
                            <p class="small text-secondary">Baru di JasaKu? <a href="{{ route('register') }}" class="fw-bold text-primary text-decoration-none">Buat Akun Sekarang</a></p>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>