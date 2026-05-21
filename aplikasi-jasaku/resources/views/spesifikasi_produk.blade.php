<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jasa - JasaKu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light" style="font-family: 'Plus Jakarta Sans', sans-serif; color: #1e293b; overflow-x: hidden;">

    <div class="container-fluid p-0">
        <div class="d-flex">

            <!-- SIDEBAR KIRI (Desktop) -->
            <nav class="d-none d-lg-flex flex-column flex-shrink-0 p-4 shadow position-fixed h-100"
                style="background-color: #0d2438; z-index: 1000; width: 16.66%;">
                <div class="d-flex align-items-center mb-5 ps-2">
                    <div class="bg-primary p-2 rounded-3 me-2">
                        <i class="bi bi-lightning-charge-fill text-white"></i>
                    </div>
                    <span class="h5 fw-bold m-0 text-white">JasaKu</span>
                </div>

                <div class="nav flex-column gap-2 flex-grow-1">
                    <a href="/beranda"
                        class="nav-link active bg-primary text-white p-3 rounded-4 small fw-bold shadow-sm text-decoration-none">
                        <i class="bi bi-house-door me-3"></i> Beranda
                    </a>
                    <a href="/profil" class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-person me-3"></i> Profil
                    </a>
                    <a href="/keranjang"
                        class="nav-link text-white-50 p-3 rounded-4 small fw-medium text-decoration-none">
                        <i class="bi bi-box-seam-fill me-3"></i> Keranjang
                    </a>
                </div>

                <!-- Profil Section -->
                <div class="border-top border-secondary pt-3 mt-3">
                    <div class="dropdown">
                        <div class="d-flex align-items-center p-2 rounded-3 dropdown-toggle shadow-none text-decoration-none"
                            data-bs-toggle="dropdown" style="cursor: pointer;">
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 40px; height: 40px; min-width: 40px;">
                                <span class="fw-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                            <div class="overflow-hidden flex-grow-1">
                                <p class="text-white fw-bold mb-0 small text-truncate">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-dark shadow border-0 p-2 rounded-4 mb-2 w-100">
                            <li><a class="dropdown-item rounded-3 py-2 small" href="/profil"><i
                                        class="bi bi-person me-2"></i> Profil</a></li>
                            <li>
                                <hr class="dropdown-divider border-secondary">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item rounded-3 py-2 small text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- MAIN CONTENT -->
            <main class="col-lg-10 offset-lg-2 col-md-12 p-3 p-md-5">
                <div class="container-fluid p-0 mx-auto" style="max-width: 1140px;">

                    <!-- Tombol Kembali -->
                    <div class="mb-4">
                        <a href="javascript:history.back()"
                            class="text-decoration-none text-muted fw-bold d-inline-flex align-items-center small">
                            <i class="bi bi-arrow-left me-2"></i> Kembali
                        </a>
                    </div>

                    <div class="row g-4">
                        <!-- KOLOM KIRI: Detail Jasa -->
                        <div class="col-lg-7">
                            <h1 class="fw-bolder text-dark mb-4 h3">{{ $jasa->nama_jasa }}</h1>

                            <div class="ratio ratio-16x9 bg-white border rounded-5 overflow-hidden shadow-sm mb-4">
                                @if ($jasa->foto)
                                    <img src="{{ asset('storage/' . $jasa->foto) }}" class="w-100 h-100"
                                        style="object-fit: cover;">
                                @else
                                    <div class="bg-light w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-image text-muted fs-1"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="text-secondary mb-4"
                                style="line-height: 1.8; white-space: pre-line; word-break: break-word;">
                                {{ $jasa->deskripsi }}
                            </div>

                            <!-- Spesifikasi Table -->
                            <div class="card border-0 shadow-sm rounded-5 p-4 mb-5">
                                <h5 class="fw-bold mb-3 small text-uppercase text-primary">Spesifikasi</h5>
                                <table class="table table-borderless m-0">
                                    <tr>
                                        <td class="ps-0 text-muted small" style="width: 30%;">Kategori</td>
                                        <!-- Mengambil dari input name="kategori_jasa" -->
                                        <td class="fw-bold small">: {{ $jasa->kategori_jasa }}</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 text-muted small">Estimasi</td>
                                        <!-- Mengambil dari input name="estimasi_pengerjaan" -->
                                        <td class="fw-bold small">: {{ $jasa->estimasi_pengerjaan }} Hari</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 text-muted small">Revisi</td>
                                        <!-- Mengambil data revisi (pastikan kolom ini ada di database) -->
                                        <!-- Jika belum ada di form edit, Anda bisa menambahkannya nanti -->
                                        <td class="fw-bold small">: {{ $jasa->jumlah_revisi ?? '2x' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 text-muted small">Format</td>
                                        <!-- Mengambil data format (pastikan kolom ini ada di database) -->
                                        <td class="fw-bold small">: {{ $jasa->format_file ?? 'jpg/png/pdf' }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Bagian Ulasan -->
                            <div class="mb-5">
                                <!-- HEADER ULASAN DENGAN TOMBOL -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold m-0 d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-2"></i> Ulasan Pengguna
                                    </h5>
                                    <a href="/ulasan" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold">
                                        Lihat Ulasan
                                    </a>
                                </div>

                                @forelse($ulasan as $item)
                                    <div class="card border-0 bg-white shadow-sm rounded-4 p-4 mb-3">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 text-white fw-bold"
                                                style="width: 40px; height: 40px; background-color: #2e7d32; font-size: 0.9rem;">
                                                {{ strtoupper(substr($item->username, 0, 1)) }}
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0 small">{{ $item->username }}</h6>
                                                <small class="text-muted" style="font-size: 0.7rem;">Pembeli
                                                    Terverifikasi</small>
                                            </div>
                                        </div>
                                        <p class="mb-0 small text-secondary" style="line-height: 1.6;">
                                            "{{ $item->ulasan }}"
                                        </p>
                                    </div>
                                @empty
                                    <div class="text-center py-4 bg-white rounded-4 shadow-sm">
                                        <i class="bi bi-chat-left-dots text-muted fs-2 mb-2 d-block"></i>
                                        <p class="text-muted small mb-0">Belum ada ulasan untuk jasa ini.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div> <!-- Akhir Kolom Kiri -->

                        <!-- KOLOM KANAN: Card Harga & Checkout -->
                        <div class="col-lg-5">
                            <div class="card border-0 shadow-lg rounded-5 overflow-hidden bg-white sticky-top"
                                style="top: 2rem;">
                                <div class="bg-primary" style="height: 8px;"></div>
                                <div class="card-body p-4 p-xl-5">
                                    <div class="text-center mb-4">
                                        <small class="fw-bold text-muted text-uppercase mb-1 d-block">Harga Mulai
                                            Dari</small>
                                        <h2 class="fw-bolder text-dark mb-0">
                                            Rp {{ number_format($jasa->harga, 0, ',', '.') }}
                                        </h2>
                                    </div>

                                    <div class="bg-light rounded-4 p-3 mb-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                                <i class="bi bi-check2 text-success fw-bold"></i>
                                            </div>
                                            <span class="small fw-medium">Dukungan teknis Prioritas</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-1 me-3">
                                                <i class="bi bi-check2 text-success fw-bold"></i>
                                            </div>
                                            <span class="small fw-medium">Garansi revisi tepat waktu</span>
                                        </div>
                                    </div>

                                    <form action="/keranjang" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_jasa" value="{{ $jasa->id_jasa }}">
                                        <button type="submit"
                                            class="btn btn-primary w-100 fw-bold py-3 rounded-4 mb-3 shadow-sm">
                                            <i class="bi bi-cart-plus me-2"></i> Masukkan Keranjang
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- Akhir Kolom Kanan -->

                    </div> <!-- Akhir Row -->
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>