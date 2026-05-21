<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jasa - JasaKu</title>
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
                    <a href="/profil" class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm text-decoration-none">
                        <i class="bi bi-person me-3"></i> Profil
                    </a>
                    <a href="/keranjang" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                    </a>
                </div>

                <!-- Bagian Profil dengan Dropdown Log Out (Desktop) -->
                <div class="border-top border-secondary pt-3 mt-3">
                    <div class="dropdown">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'" onmouseout="this.style.backgroundColor='transparent'">

                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; min-width: 40px;">
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

            <!-- Menu Offcanvas untuk Mobile -->
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
                        <li class="nav-item">
                            <a href="/beranda" class="nav-link text-white-50 py-3 mb-2 text-decoration-none">
                                <i class="bi bi-house-door me-3"></i> Beranda
                            </a>
                        </li>
                        <li>
                            <a href="/profil" class="nav-link active bg-primary py-3 mb-2 rounded-3 shadow-sm text-white text-decoration-none">
                                <i class="bi bi-person-fill me-3"></i> Profil
                            </a>
                        </li>
                        <li>
                            <a href="/keranjang" class="nav-link text-white-50 py-3 mb-2 text-decoration-none">
                                <i class="bi bi-box-seam me-3"></i> Keranjang
                            </a>
                        </li>
                    </ul>

                    <!-- Bagian Profil dengan Dropdown (Mobile) -->
                    <div class="border-top border-secondary pt-3 mt-auto">
                        <div class="dropup">
                            <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;" onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'" onmouseout="this.style.backgroundColor='transparent'">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; min-width: 40px;">
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

            <!-- Main Content Area -->
            <div class="flex-grow-1 d-flex flex-column min-vh-100">

                <!-- Header -->
                <header class="p-3 p-md-4 d-flex align-items-center justify-content-between sticky-top shadow-sm" style="background-color: #0d2438;">
                    <div class="d-flex align-items-center overflow-hidden">
                        <button class="btn btn-outline-light border-0 d-lg-none me-2 p-1 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                            <i class="bi bi-list fs-2"></i>
                        </button>

                        <a href="/mulai_jual_jasa" class="btn btn-outline-light border-0 rounded-circle me-2 d-none d-sm-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-arrow-left fs-5"></i>
                        </a>

                        <div class="text-white text-truncate">
                            <h2 class="h5 fw-bold m-0 text-truncate">Edit Jasa</h2>
                            <p class="opacity-50 mb-0 small d-none d-sm-block text-truncate">Lengkapi kembali informasi jasa Anda.</p>
                        </div>
                    </div>
                </header>

                <!-- Form Area -->
                <div class="p-3 p-md-5">
                    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 mx-auto w-100 border" style="max-width: 850px;">
                        <form action="/edit-jasa/{{ $jasa->id_jasa }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Section 1 -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-4">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold small" style="width: 28px; height: 28px;">1</div>
                                    <h6 class="fw-bold m-0 text-dark text-uppercase small" style="letter-spacing: 1px;">Identitas Jasa</h6>
                                </div>
                                <div class="row g-3">
                                    <!-- Bagian ID Jasa telah dihapus -->
                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Nama Pemilik</label>
                                        <input type="text" name="nama" class="form-control border-0 bg-light rounded-3 small shadow-none text-dark py-2" value="{{ $jasa->nama ?? Auth::user()->name }}" placeholder="Masukkan nama pemilik jasa" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Nama Jasa</label>
                                        <input type="text" name="nama_jasa" class="form-control border-0 bg-light rounded-3 small shadow-none text-dark py-2" value="{{ $jasa->nama_jasa }}" required>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 border-secondary border-opacity-10">

                            <!-- Section 2 -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-4">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold small" style="width: 28px; height: 28px;">2</div>
                                    <h6 class="fw-bold m-0 text-dark text-uppercase small" style="letter-spacing: 1px;">Kategori & Deskripsi</h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Kategori Jasa</label>
                                        <input type="text" name="kategori_jasa" class="form-control border-0 bg-light rounded-3 small shadow-none text-dark py-2" value="{{ $jasa->kategori_jasa }}" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary mb-1">Deskripsi Jasa</label>
                                        <textarea name="deskripsi" class="form-control border-0 bg-light rounded-3 small shadow-none text-dark py-2" rows="5" required>{{ $jasa->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 border-secondary border-opacity-10">

                            <!-- Section 3 -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-4">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold small" style="width: 28px; height: 28px;">3</div>
                                    <h6 class="fw-bold m-0 text-dark text-uppercase small" style="letter-spacing: 1px;">Biaya & Waktu</h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary mb-1">Estimasi Pengerjaan (Hari)</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-0 bg-light text-secondary"><i class="bi bi-clock"></i></span>
                                            <input type="number" name="estimasi_pengerjaan" class="form-control border-0 bg-light shadow-none" value="{{ $jasa->estimasi_pengerjaan }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary mb-1">Harga Jasa (Rp)</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-0 bg-light fw-bold text-secondary small">Rp</span>
                                            <input type="number" name="harga" class="form-control border-0 bg-light shadow-none" value="{{ $jasa->harga }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 border-secondary border-opacity-10">

                            <!-- Section 4 -->
                            <div class="mb-5">
                                <div class="d-flex align-items-center gap-2 mb-4">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold small" style="width: 28px; height: 28px;">4</div>
                                    <h6 class="fw-bold m-0 text-dark text-uppercase small" style="letter-spacing: 1px;">Media Utama</h6>
                                </div>

                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-secondary mb-2">Foto Saat Ini</label>
                                        <div class="mb-4">
                                            @if(isset($jasa) && $jasa->foto)
                                            <div class="position-relative d-inline-block rounded-4 overflow-hidden border shadow-sm" style="width: 100%; max-width: 350px;">
                                                <img src="{{ asset('storage/' . $jasa->foto) }}" id="preview-foto" class="w-100" style="height: 200px; object-fit: cover;">
                                                <div class="position-absolute top-0 start-0 m-2 badge bg-primary">Aktif</div>
                                            </div>
                                            @else
                                            <div class="bg-light rounded-4 d-flex flex-column align-items-center justify-content-center text-muted border border-dashed" style="width: 100%; max-width: 350px; height: 200px;">
                                                <i class="bi bi-image fs-1 opacity-25"></i>
                                                <span class="small mt-2">Belum ada foto</span>
                                            </div>
                                            @endif
                                        </div>

                                        <div class="p-4 border border-dashed rounded-4 bg-light text-center">
                                            <i class="bi bi-cloud-arrow-up text-primary fs-2 mb-2"></i>
                                            <h6 class="fw-bold mb-1 small">Ganti atau Pilih Foto Baru</h6>
                                            <p class="text-muted extra-small mb-3" style="font-size: 0.75rem;">JPG atau PNG (Maksimal 2MB)</p>
                                            <input type="file" name="foto" id="input-foto" class="form-control form-control-sm border-0 shadow-none mx-auto w-75" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="pt-3">
                                <button type="submit" class="btn btn-primary w-100 rounded-3 fw-bold py-3 shadow-sm border-0">
                                    Simpan Perubahan
                                </button>
                                <a href="/profil" class="btn btn-link w-100 text-decoration-none mt-2 text-secondary small">Batalkan</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="text-center py-4 border-top bg-white mt-auto">
                    <p class="text-muted mb-0 small opacity-75">© 2026 JasaKu Indonesia • Versi Pro</p>
                </footer>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('input-foto').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                const preview = document.getElementById('preview-foto');
                if (preview) {
                    preview.src = URL.createObjectURL(file)
                }
            }
        }
    </script>
</body>

</html>