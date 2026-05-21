<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jasa Baru - JasaKu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="container-fluid p-0">
        <div class="d-flex flex-column flex-lg-row">

            <!-- SIDEBAR KIRI (Hanya muncul di Desktop) -->
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

                <!-- POJOK KIRI BAWAH: Profil (Desktop) -->
                <div class="border-top border-secondary pt-3 mt-auto">
                    <div class="dropdown">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none"
                            data-bs-toggle="dropdown"
                            style="cursor: pointer;"
                            onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'"
                            onmouseout="this.style.backgroundColor='transparent'">

                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 38px; height: 38px; min-width: 38px;">
                                <span class="fw-bold small">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                            <div class="overflow-hidden flex-grow-1">
                                <p class="text-white fw-bold mb-0 small text-truncate">{{ Auth::user()->name }}</p>
                            </div>
                            <i class="bi bi-chevron-up text-white-50 ms-2 small"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-dark shadow border-secondary w-100 rounded-3 small">
                            <li><a class="dropdown-item py-2" href="/profillogin"><i class="bi bi-person me-2"></i> Detail Profil</a></li>
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
                <div class="offcanvas-header border-bottom border-secondary p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary p-2 rounded-3 me-2">
                            <i class="bi bi-lightning-charge-fill text-white"></i>
                        </div>
                        <h5 class="offcanvas-title fw-bold">JasaKu</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column p-4">
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
                            <div class="overflow-hidden">
                                <h6 class="mb-0 fw-bold text-truncate">{{ Auth::user()->name }}</h6>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100 rounded-pill fw-bold small py-2">
                                <i class="bi bi-box-arrow-right me-2"></i> Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-grow-1 d-flex flex-column min-vh-100">

                <!-- Header -->
                <header class="p-3 p-md-4 d-flex align-items-center justify-content-between sticky-top shadow-sm" style="background-color: #0d2438; z-index: 1020;">
                    <div class="d-flex align-items-center overflow-hidden">
                        <button class="btn btn-outline-light border-0 d-lg-none me-2 p-1 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                            <i class="bi bi-list fs-2"></i>
                        </button>

                        <a href="/mulai_jual_jasa" class="btn btn-outline-light border-0 rounded-circle me-2 d-none d-sm-flex shadow-none">
                            <i class="bi bi-arrow-left fs-4"></i>
                        </a>

                        <div class="text-white text-truncate">
                            <h2 class="h5 fw-bold m-0 text-truncate">Tambah Jasa Baru</h2>
                            <p class="opacity-50 mb-0 small d-none d-sm-block">Lengkapi formulir publikasi jasa Anda.</p>
                        </div>
                    </div>
                </header>

                <!-- Form Area -->
                <div class="p-3 p-md-4 flex-grow-1">
                    <div class="bg-white rounded-4 shadow-sm p-3 p-md-5 mx-auto w-100 mb-4" style="max-width: 850px;">
                        <form action="{{ url('tambah') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Seksi 1 -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold small" style="width: 28px; height: 28px;">1</div>
                                    <h6 class="fw-bold m-0 text-dark text-uppercase small" style="letter-spacing: 1px;">Identitas & Profil</h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Nama Pemilik</label>
                                        <input type="text" name="nama" class="form-control border-0 bg-light rounded-3 small shadow-none text-dark py-2" value="{{ $jasa->nama ?? Auth::user()->name }}" placeholder="Masukkan nama pemilik jasa" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Nama Jasa</label>
                                        <input type="text" name="nama_jasa" class="form-control border-0 bg-light rounded-3 small shadow-none text-dark py-2" placeholder="Contoh: Jasa Desain Logo Minimalis" required>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 border-secondary border-opacity-10">

                            <!-- Seksi 2 -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold small" style="width: 28px; height: 28px;">2</div>
                                    <h6 class="fw-bold m-0 text-dark text-uppercase small" style="letter-spacing: 1px;">Klasifikasi & Detail</h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Kategori Jasa</label>
                                        <select name="kategori_jasa" class="form-select border-2 bg-light rounded-3 small shadow-none" required>
                                            <option value="" selected disabled>Pilih Kategori...</option>
                                            <option value="IT & Software">IT & Software</option>
                                            <option value="Desain Grafis">Desain Grafis</option>
                                            <option value="Pemasaran Digital">Pemasaran Digital</option>
                                            <option value="Penulisan & Terjemahan">Penulisan & Terjemahan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Deskripsi Jasa</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control border-2 bg-light rounded-3 small shadow-none text-dark" rows="4" placeholder="Jelaskan layanan Anda, apa yang didapat klien, dan keunggulan jasa Anda..." required></textarea>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 border-secondary border-opacity-10">

                            <!-- Seksi 3 -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold small" style="width: 28px; height: 28px;">3</div>
                                    <h6 class="fw-bold m-0 text-dark text-uppercase small" style="letter-spacing: 1px;">Estimasi & Harga</h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary mb-1">Estimasi Pengerjaan (Hari)</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-2 bg-light text-secondary"><i class="bi bi-clock"></i></span>
                                            <input type="number" name="estimasi_pengerjaan" class="form-control border-2 bg-light small shadow-none text-dark" placeholder="Contoh: 3" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary mb-1">Harga Jasa (Rp)</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-2 bg-light fw-bold text-secondary small">Rp</span>
                                            <input type="number" name="harga" class="form-control border-2 bg-light small shadow-none text-dark" placeholder="Contoh: 150000" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Seksi 4 -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold small" style="width: 28px; height: 28px;">4</div>
                                    <h6 class="fw-bold m-0 text-dark text-uppercase small" style="letter-spacing: 1px;">Portofolio & Media</h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Unggah Foto Utama Jasa</label>
                                        <div class="card border-2 border-dashed bg-light py-4 text-center" style="border-style: dashed !important;">
                                            <div class="card-body">
                                                <i class="bi bi-image text-primary fs-1 mb-2"></i>
                                                <h6 class="fw-bold mb-1 small">Klik untuk pilih foto</h6>
                                                <p class="text-muted small mb-3">Format: JPG, PNG (Maks. 2MB)</p>
                                                <input type="file" name="foto" class="form-control form-control-sm border-2 bg-white w-75 mx-auto shadow-none d-inline-block" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-md w-100 rounded-3 fw-bold py-2 shadow-sm transition-all" style="height: 50px;">
                                    Publikasikan Jasa Sekarang
                                </button>
                                <a href="/mulai_jual_jasa" class="btn btn-link w-100 mt-2 text-decoration-none text-muted small fw-bold">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="text-center py-3 border-top bg-white mt-auto">
                    <p class="text-muted mb-0 small opacity-75">© 2026 JasaKu Indonesia • Versi 1.0.4</p>
                </footer>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>