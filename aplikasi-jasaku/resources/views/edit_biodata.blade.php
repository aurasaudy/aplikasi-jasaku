<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata - JasaKu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light" style="font-family: 'Inter', sans-serif;">

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- SIDEBAR KIRI (Desktop) -->
            <nav class="col-lg-2 d-none d-lg-flex flex-column position-fixed h-100 p-4 shadow" style="background-color: #0d2438; z-index: 1030;">
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

                <div class="border-top border-secondary pt-3">
                    <div class="dropdown dropup">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="cursor: pointer;">
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;min-width:40px;">
                                <span class="fw-bold">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
                            </div>
                            <div class="overflow-hidden flex-grow-1 text-white">
                                <p class="fw-bold mb-0 small text-truncate">{{ Auth::user()->name ?? 'User Name' }}</p>
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

            <!-- Navbar Mobile Header -->
            <div class="d-lg-none bg-white p-3 shadow-sm fixed-top d-flex justify-content-between align-items-center" style="z-index: 1040;">
                <button class="btn border-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <i class="bi bi-list fs-3"></i>
                </button>
                <div class="d-flex align-items-center">
                    <div class="bg-primary p-2 rounded-3 me-2">
                        <i class="bi bi-lightning-charge-fill text-white"></i>
                    </div>
                    <span class="h5 fw-bold m-0" style="color: #0d2438;">JasaKu</span>
                </div>
            </div> 
            
            <!-- Offcanvas Mobile -->
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
                        <li><a href="/beranda" class="nav-link text-white-50 py-3 mb-2 text-decoration-none"><i class="bi bi-house-door-fill me-3"></i> Beranda</a></li>
                        <li><a href="/profil" class="nav-link active bg-primary py-3 mb-2 rounded-3 text-white text-decoration-none"><i class="bi bi-person me-3"></i> Profil</a></li>
                        <li><a href="/keranjang" class="nav-link text-white-50 py-3 mb-2 text-decoration-none"><i class="bi bi-box-seam me-3"></i> Keranjang</a></li>
                    </ul>
                    <div class="border-top border-secondary pt-3 mt-auto">
                        <div class="dropup">
                            <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none" data-bs-toggle="dropdown" style="cursor:pointer;">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;min-width:40px;">
                                    <span class="fw-bold">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
                                </div>
                                <div class="overflow-hidden flex-grow-1 text-white">
                                    <p class="fw-bold mb-0 small text-truncate">{{ Auth::user()->name ?? 'User Name' }}</p>
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

            <!-- MAIN CONTENT -->
            <main class="col-lg-10 offset-lg-2 px-4 py-5" style="min-height: 100vh; padding-top: 80px !important;">
                <div class="container-fluid">

                    <!-- Header & Button Kembali -->
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                        <div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item small"><a href="/profil" class="text-decoration-none">Profil</a></li>
                                    <li class="breadcrumb-item active small" aria-current="page">Edit Biodata</li>
                                </ol>
                            </nav>
                            <h3 class="fw-bold m-0">Pengaturan Profil</h3>
                        </div>
                        <div>
                            <a href="/profil" class="btn btn-white bg-white border shadow-sm px-3 rounded-3 fw-medium">
                                <i class="bi bi-arrow-left me-2"></i> Kembali ke Profil
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body p-4 p-md-5">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                            <i class="bi bi-person-gear text-primary fs-4"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold mb-0">Lengkapi Biodata</h5>
                                            <p class="text-muted small mb-0">Pastikan informasi telepon dan alamat sudah benar.</p>
                                        </div>
                                    </div>

                                    <hr class="my-4 opacity-50">

                                    <!-- Form Edit Biodata -->
                                    <form action="/edit-biodata/{{ $profil->user_id }}" method="POST">
                                        @csrf

                                        <div class="row g-4">
                                            <!-- Form Telepon -->
                                            <div class="col-12">
                                                <label for="phone" class="form-label fw-semibold small text-uppercase opacity-75">Nomor Telepon</label>
                                                <div class="input-group shadow-none">
                                                    <span class="input-group-text bg-light border-end-0 px-3"><i class="bi bi-telephone text-muted"></i></span>
                                                    <input type="tel" class="form-control border-start-0 py-2 shadow-none @error('phone') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ $profil->no_telepon }}" required>
                                                </div>
                                                @error('phone')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                                <div class="form-text mt-2 small text-muted">Nomor ini akan digunakan untuk konfirmasi pesanan jasa.</div>
                                            </div>

                                            <!-- Form Alamat -->
                                            <div class="col-12">
                                                <label for="address" class="form-label fw-semibold small text-uppercase opacity-75">Alamat Lengkap</label>
                                                <div class="input-group shadow-none">
                                                    <span class="input-group-text bg-light border-end-0 align-items-start pt-2 px-3"><i class="bi bi-geo-alt text-muted"></i></span>
                                                    <textarea class="form-control border-start-0 py-2 shadow-none @error('address') is-invalid @enderror"
                                                        id="alamat"
                                                        name="alamat"
                                                        rows="4"
                                                        required>{{ $profil->alamat }}</textarea>
                                                </div>
                                                @error('address')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Submit Buttons -->
                                            <div class="col-12 mt-5">
                                                <div class="d-flex flex-column flex-sm-row gap-3">
                                                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-3 fw-bold shadow-sm">
                                                        <i class="bi bi-check2-circle me-2"></i> Simpan Perubahan
                                                    </button>
                                                    <a href="/profil" class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-medium">
                                                        Batalkan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar Info/Tips -->
                        <div class="col-xl-4 d-none d-xl-block">
                            <div class="card border-0 bg-primary text-white mb-4 rounded-4 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-shield-check fs-2 me-3"></i>
                                        <h6 class="fw-bold mb-0">Keamanan Data</h6>
                                    </div>
                                    <p class="small opacity-75 mb-0">Data pribadi Anda aman bersama kami dan tidak akan disebarkan ke pihak luar tanpa izin Anda.</p>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body p-4">
                                    <h6 class="fw-bold mb-3"><i class="bi bi-lightbulb me-2 text-warning"></i> Tips Mengisi Alamat</h6>
                                    <p class="small text-muted mb-0">
                                        Cantumkan detail seperti nomor rumah, patokan, atau instruksi khusus untuk mempermudah penyedia jasa menemukan lokasi Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>