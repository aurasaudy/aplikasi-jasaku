<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Biodata - JasaKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light d-flex flex-column vh-100 overflow-hidden" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm py-2 flex-shrink-0" style="background-color: #0d2438;">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="/beranda">
                <div class="bg-primary p-2 rounded-3 me-2 d-inline-flex">
                    <i class="bi bi-lightning-charge-fill text-white fs-5"></i>
                </div>
                <span>JasaKu</span>
            </a>
            <div class="ms-auto">
                <div class="dropdown">
                    <button class="btn btn-link text-white text-decoration-none dropdown-toggle d-flex align-items-center gap-2 shadow-none border-0" type="button" data-bs-toggle="dropdown">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:32px;height:32px;font-size:0.8rem;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="d-none d-md-inline small fw-bold">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2 p-2 rounded-3">
                        <li class="px-3 py-2 border-bottom mb-1">
                            <p class="mb-0 fw-bold small text-dark">{{ Auth::user()->name }}</p>
                            <p class="mb-0 text-muted" style="font-size:0.7rem;">{{ Auth::user()->email }}</p>
                        </li>
                        <li><a class="dropdown-item py-2 small rounded-2" href="/profil"><i class="bi bi-person me-2"></i>Profil</a></li>
                        <li>
                            <hr class="dropdown-divider mx-2">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 small text-danger rounded-2 w-100 text-start">
                                    <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="flex-grow-1 overflow-hidden d-flex align-items-center py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">

                    <!-- Tombol Kembali -->
                    <div class="mb-2">
                        <a href="javascript:history.back()" class="text-decoration-none text-muted fw-bold d-inline-flex align-items-center bg-white px-3 py-2 rounded-pill shadow-sm border">
                            <i class="bi bi-arrow-left me-2"></i> Kembali
                        </a>
                    </div>

                    <!-- Card -->
                    <div class="card border-0 shadow-lg rounded-5 overflow-hidden">
                        <div class="row g-0">

                            <!-- Sisi Kiri -->
                            <div class="col-md-4 d-none d-md-flex flex-column justify-content-center align-items-center text-white p-4" style="background: linear-gradient(135deg, #0d2438 0%, #1e3a5f 100%);">
                                <div class="bg-white bg-opacity-10 p-4 rounded-4 mb-3 border border-white border-opacity-10">
                                    <i class="bi bi-shield-lock-fill text-white" style="font-size:2.8rem;"></i>
                                </div>
                                <h5 class="fw-bold text-center mb-2">Keamanan Profil</h5>
                                <p class="small text-center opacity-75 mb-4 px-2">Data kontak Anda hanya digunakan untuk mempermudah komunikasi antara pembeli dan penjual secara resmi.</p>
                                <div class="w-100 d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-3 bg-white bg-opacity-10 p-3 rounded-4 border border-white border-opacity-10">
                                        <i class="bi bi-check2-circle text-primary fs-5"></i>
                                        <span class="small fw-medium">Verifikasi Cepat</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 bg-white bg-opacity-10 p-3 rounded-4 border border-white border-opacity-10">
                                        <i class="bi bi-headset text-primary fs-5"></i>
                                        <span class="small fw-medium">Dukungan 24/7</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sisi Kanan: Form -->
                            <div class="col-12 col-md-8 bg-white">
                                <div class="p-4">

                                    <div class="mb-3 text-center text-md-start">
                                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-2" style="font-size:0.7rem;letter-spacing:1px;">PENGATURAN PROFIL</span>
                                        <h4 class="fw-bold text-dark mb-1">Lengkapi Biodata</h4>
                                        <p class="text-muted small mb-0">Halo <strong>{{ Auth::user()->name }}</strong>, silakan perbarui data kontak Anda.</p>
                                    </div>


                                    <form action="{{ url('tambah-biodata') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Nama -->
                                        <div class="mb-3">
                                            <label for="nama" class="form-label fw-bold small text-dark mb-1">Nama Lengkap</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0 px-3">
                                                    <i class="bi bi-person text-primary"></i>
                                                </span>
                                                <input type="text" name="nama" id="nama"
                                                    class="form-control bg-light border-0 shadow-none py-2"
                                                    placeholder="Nama lengkap Anda"
                                                    value="{{ Auth::user()->name }}" required>
                                            </div>
                                        </div>

                                        <!-- Nomor Telepon -->
                                        <div class="mb-3">
                                            <label for="no_telepon" class="form-label fw-bold small text-dark mb-1">Nomor Telepon (WhatsApp)</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0 px-3">
                                                    <i class="bi bi-phone text-primary"></i>
                                                </span>
                                                <input type="tel" name="no_telepon" id="no_telepon"
                                                    class="form-control bg-light border-0 shadow-none py-2"
                                                    placeholder="Contoh: 081234567890" required>
                                            </div>
                                            <div class="form-text text-muted" style="font-size:0.72rem;">Pastikan nomor terhubung dengan WhatsApp aktif.</div>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label fw-bold small text-dark mb-1">Alamat Lengkap Domisili</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0 px-3 align-items-start pt-3">
                                                    <i class="bi bi-geo-alt-fill text-danger"></i>
                                                </span>
                                                <textarea name="alamat" id="alamat" rows="3"
                                                    class="form-control bg-light border-0 shadow-none py-2"
                                                    placeholder="Nama Jalan, Blok/No, RT/RW, Kecamatan, Kota/Kabupaten" required></textarea>
                                            </div>
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="d-grid mt-3">
                                            <button type="submit" class="btn btn-primary fw-bold py-2 rounded-4 border-0">
                                                Simpan Perubahan Profil
                                            </button>
                                        </div>
                                        <p class="text-center text-muted mt-2 mb-0 small">
                                            <i class="bi bi-info-circle me-1"></i> Data akan disimpan ke server JasaKu.
                                        </p>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="text-center mt-2">
                        <p class="text-muted small opacity-50 mb-0">&copy; 2026 JasaKu Indonesia • Versi Dashboard 2.1</p>
                    </div>

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