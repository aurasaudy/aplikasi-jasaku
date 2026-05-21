<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - JasaKu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light min-vh-100 d-flex flex-column" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="container-fluid p-0 flex-grow-1">
        <div class="row g-0 min-vh-100">
            <!-- SIDEBAR KIRI -->
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
                    <a href="/profil" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-person me-3"></i> Profil
                    </a>
                    <a href="/keranjang" class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm text-decoration-none">
                        <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                    </a>
                </div>

                <div class="border-top border-secondary pt-3 mt-3">
                    <div class="dropdown">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'" onmouseout="this.style.backgroundColor='transparent'">
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
                                    <button type="submit" class="dropdown-item py-2 text-danger border-0 bg-transparent w-100 text-start">
                                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- MAIN CONTENT AREA -->
            <div class="col-12 col-lg-10 d-flex flex-column">

                <header class="navbar navbar-light bg-white border-bottom px-4 py-2 d-lg-none">
                    <div class="d-flex align-items-center w-100">
                        <button class="btn border-0 p-0 me-3 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                            <i class="bi bi-list fs-2 text-dark"></i>
                        </button>
                        <h6 class="fw-bold m-0 text-dark">Keranjang</h6>
                    </div>
                </header>

                <main class="p-3 p-md-4 p-lg-5 flex-grow-1">
                    <div class="mb-4">
                        <h2 class="fw-bold h4">Pesanan Anda</h2>
                    </div>

                    <div class="row g-4">
                        <!-- Sisi Kiri: Pesanan -->
                        <div class="col-lg-8">
                            <div id="cart-items-container">
                                @if($jasa->isEmpty())
                                <div class="text-center py-5 bg-white rounded-4 shadow-sm border">
                                    <i class="bi bi-cart-x fs-1 text-muted opacity-25"></i>
                                    <p class="text-muted mt-2">Keranjang masih kosong</p>
                                    <a href="/beranda" class="btn btn-primary btn-sm rounded-3 px-4">Cari Jasa</a>
                                </div>
                                @endif

                                @foreach($jasa as $item)
                                <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                                    <div class="card-body p-3 p-md-4">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-4 col-sm-3 col-md-2">
                                                <div class="ratio ratio-1x1 bg-light rounded-3 border overflow-hidden">
                                                    <img src="{{ asset('storage/' . $item->foto) }}" class="w-100 h-100" style="object-fit: cover">
                                                </div>
                                            </div>
                                            <div class="col-8 col-sm-9 col-md-7">
                                                <span class="badge bg-primary bg-opacity-10 text-primary mb-1 text-uppercase" style="font-size: 0.7rem;">
                                                    {{ $item->kategori_jasa ?? 'UMUM' }}
                                                </span>
                                                <h6 class="fw-bold mb-1 text-dark text-truncate">{{ $item->nama_jasa }}</h6>
                                                <form action="/keranjang/{{ $item->id_keranjang }}" method="POST" onsubmit="return confirm('Yakin menghapus jasa ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm p-0 text-danger small fw-bold shadow-none border-0 bg-transparent">
                                                        <i class="bi bi-trash me-1"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-12 col-md-3 text-md-end border-top border-md-0 mt-3 mt-md-0 pt-3 pt-md-0">
                                                <span class="fw-bold text-primary h5 m-0">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Sisi Kanan: Ringkasan -->
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-lg rounded-4 p-4 text-white sticky-top" style="background-color: #0d2438; top: 1.5rem;">
                                <h6 class="fw-bold mb-4">Ringkasan Biaya</h6>

                                @php
                                $subtotal = $total ?? 0;
                                $admin = 0;

                                if ($subtotal > 0) {
                                if ($subtotal < 100000) {
                                    $admin=2000;
                                    } else {
                                    $admin=5000;
                                    }
                                    }

                                    $grandTotal=$subtotal + $admin;
                                    @endphp

                                    <div class="d-flex justify-content-between mb-2 small opacity-75">
                                    <span>Subtotal</span>
                                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2 small opacity-75">
                                <span>Biaya Layanan</span>
                                <span>
                                    @if($admin > 0)
                                    Rp {{ number_format($admin, 0, ',', '.') }}
                                    @else
                                    Rp 0
                                    @endif
                                </span>
                            </div>

                            <hr class="opacity-25 border-white">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="small opacity-75">Total Bayar</span>
                                <span class="h4 fw-bold text-primary m-0">
                                    Rp {{ number_format($grandTotal, 0, ',', '.') }}
                                </span>
                            </div>

                            <button @if($subtotal <=0) disabled @endif onclick="window.location.href='/checkout'" class="btn btn-primary w-100 py-3 fw-bold rounded-3 shadow-none border-0">
                                Konfirmasi Pembayaran
                            </button>
                            <p class="text-center extra-small mt-3 opacity-50 mb-0" style="font-size: 0.7rem;">
                                Dana aman dengan sistem Escrow JasaKu.
                            </p>
                        </div>
                    </div>
            </div>
            </main>

            <footer class="text-center py-4 border-top bg-white mt-auto">
                <p class="text-muted mb-0 small opacity-75">© 2026 JasaKu Indonesia • Versi 1.0.4</p>
            </footer>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>