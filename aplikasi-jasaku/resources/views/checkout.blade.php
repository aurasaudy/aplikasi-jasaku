<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - JasaKu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <!-- Navbar Minimalis -->
    <nav class="navbar navbar-expand-lg navbar-dark py-3 shadow-sm sticky-top" style="background-color: #0d2438;">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/beranda">
                <div class="bg-primary p-1 rounded-2 d-flex align-items-center justify-content-center">
                    <i class="bi bi-lightning-charge-fill text-white fs-6"></i>
                </div>
                JasaKu
            </a>
            <div class="ms-auto">
                <a href="/keranjang" class="text-white-50 text-decoration-none small fw-bold d-flex align-items-center gap-2">
                    <i class="bi bi-chevron-left"></i> Kembali ke Keranjang
                </a>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <!-- Header Checkout -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="fw-800 text-dark mb-2" style="font-weight: 800; letter-spacing: -1px;">Verifikasi Pesanan</h2>
                <p class="text-muted small">Pastikan semua instruksimu sudah benar sebelum kami mulai bekerja.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Kolom Kiri: Form Detail & Instruksi -->
            <div class="col-lg-7">

                <!-- Ringkasan Item -->
                <h5 class="fw-bold mb-4 text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-info-circle text-primary"></i> Informasi Jasa
                </h5>

                @foreach ($jasa as $item)
                <div class="card border-0 rounded-4 shadow-sm mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-4 border border-opacity-10 border-secondary">
                            <div class="bg-white rounded-3 d-flex align-items-center justify-content-center border overflow-hidden" style="width: 80px; height: 80px;">
                                @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="w-100 h-100" style="object-fit: cover;">
                                @else
                                <i class="bi bi-palette-fill text-primary fs-2"></i>
                                @endif
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ $item->nama_jasa }}</h6>
                                <p class="text-muted small mb-0">Harga: <span class="fw-bold text-dark">Rp {{ number_format($item->harga, 0, ',', '.') }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- METODE PEMBAYARAN (Diselaraskan dengan Keranjang) -->
                <div class="card border-0 rounded-4 shadow-sm mb-4 mt-4 p-4">
                    <h5 class="fw-bold mb-4 text-dark d-flex align-items-center gap-2">
                        <i class="bi bi-credit-card-2-front text-primary"></i> Metode Pembayaran
                    </h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input class="btn-check" type="radio" name="pay" id="pay1" checked>
                            <label class="btn btn-outline-primary border-secondary border-opacity-50 w-100 h-100 p-3 rounded-4 d-flex align-items-center gap-3 text-start shadow-none" for="pay1">
                                <i class="bi bi-wallet2 fs-4"></i>
                                <div>
                                    <div class="fw-bold small">Saldo JasaKu</div>
                                    <div class="small opacity-75 text-nowrap">E-Wallet</div>
                                </div>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <input class="btn-check" type="radio" name="pay" id="pay2">
                            <label class="btn btn-outline-primary border-secondary border-opacity-50 w-100 h-100 p-3 rounded-4 d-flex align-items-center gap-3 text-start shadow-none" for="pay2">
                                <i class="bi bi-bank fs-4"></i>
                                <div>
                                    <div class="fw-bold small">Transfer Bank</div>
                                    <div class="small opacity-75 text-nowrap">Virtual Acc</div>
                                </div>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <input class="btn-check" type="radio" name="pay" id="pay3">
                            <label class="btn btn-outline-primary border-secondary border-opacity-50 w-100 h-100 p-3 rounded-4 d-flex align-items-center gap-3 text-start shadow-none" for="pay3">
                                <i class="bi bi-cash-stack fs-4"></i>
                                <div>
                                    <div class="fw-bold small">COD</div>
                                    <div class="small opacity-75 text-nowrap">Bayar Ditempat</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form Instruksi Khusus -->
                <div class="card border-0 rounded-4 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 text-dark d-flex align-items-center gap-2">
                            <i class="bi bi-pencil-square text-primary"></i> Instruksi Pengerjaan
                        </h5>
                        <div class="mb-0">
                            <label class="form-label small fw-bold text-muted text-uppercase mb-2" style="letter-spacing: 0.5px;">Catatan untuk Penjual</label>
                            <textarea name="catatan" class="form-control rounded-4 border-2 p-3 bg-light border-0 shadow-none fs-6" rows="4" placeholder="Contoh: Tolong buatkan desain yang elegan dengan nuansa warna biru..."></textarea>
                            <div class="form-text small mt-2 text-muted italic">Berikan detail sebanyak mungkin agar hasil pengerjaan sesuai dengan keinginan Anda.</div>
                        </div>
                    </div>
                </div>

                <!-- Opsi Tambahan -->
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 text-dark d-flex align-items-center gap-2">
                            <i class="bi bi-plus-circle text-primary"></i> Layanan Tambahan
                        </h5>
                        <div class="list-group list-group-flush">
                            <label class="list-group-item d-flex justify-content-between align-items-center py-3 border-0 px-0 bg-transparent">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3 shadow-none border-secondary extra-service" type="checkbox" name="layanan_tambahan[]" value="100000" id="serviceExpress">
                                    <div>
                                        <div class="fw-bold small text-dark">Pengerjaan Ekspres (2 Hari)</div>
                                        <div class="text-muted small">Prioritaskan pesanan Anda agar lebih cepat.</div>
                                    </div>
                                </div>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill fw-bold">+Rp 100.000</span>
                            </label>
                            <label class="list-group-item d-flex justify-content-between align-items-center py-3 border-0 px-0 mt-2 bg-transparent">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3 shadow-none border-secondary extra-service" type="checkbox" name="layanan_tambahan[]" value="50000" id="serviceRevision">
                                    <div>
                                        <div class="fw-bold small text-dark">Revisi Tanpa Batas</div>
                                        <div class="text-muted small">Dapatkan jaminan revisi sepuasnya sampai cocok.</div>
                                    </div>
                                </div>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill fw-bold">+Rp 50.000</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Ringkasan & Pembayaran -->
            <div class="col-lg-5">
                <div class="position-sticky" style="top: 100px;">
                    <div class="card border-0 rounded-5 shadow-lg overflow-hidden">
                        <div class="card-header border-0 py-4 text-center text-white" style="background-color: #0d2438;">
                            <span class="small fw-bold text-uppercase" style="letter-spacing: 2px;">Ringkasan Pembayaran</span>
                        </div>
                        <div class="card-body p-4">
                            @php
                            $subtotal = $total ?? 0;
                            $admin = 0;
                            if ($subtotal > 0) {
                            $admin = ($subtotal < 100000) ? 2000 : 5000;
                                }
                                @endphp

                                <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Total Harga Jasa</span>
                                <span class="fw-bold small text-dark">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        <!-- Baris Layanan Tambahan -->
                        <div id="extraServicesRow" class="d-none">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Layanan Tambahan</span>
                                <span class="fw-bold small text-dark" id="extraServicesDisplay">Rp 0</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted small">Biaya Layanan</span>
                            <span class="fw-bold small text-dark">Rp {{ number_format($admin, 0, ',', '.') }}</span>
                        </div>

                        <hr class="my-4 opacity-10">

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 fw-bold mb-0">Total Pembayaran</span>
                            <span class="h5 fw-bold mb-0 text-primary" id="finalTotalDisplay">Rp {{ number_format($subtotal + $admin, 0, ',', '.') }}</span>
                        </div>

                        <form action="/invoice" method="POST">
                            @csrf
                            <input type="hidden" name="catatan" id="hidden_catatan">
                            <input type="hidden" name="metode_bayar" id="hidden_metode">
                            <div id="hidden_extras_container"></div> <!-- TAMBAH INI -->
                            <button type="submit" class="btn btn-primary w-100 btn-lg rounded-4 fw-bold mt-4 border-0 shadow-sm">
                                Konfirmasi & Bayar
                            </button>
                        </form>
                        <div class="text-center mt-3">
                            <span class="extra-small text-muted" style="font-size: 0.7rem;"><i class="bi bi-shield-check me-1"></i>Transaksi terlindungi oleh JasaKu Escrow</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- Script Logika Penjumlahan -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const baseTotal = {{ intval($total ?? 0) }};
            const serviceFee = (baseTotal < 100000 && baseTotal > 0) ? 2000 : 5000;

            const checkboxes = document.querySelectorAll('.extra-service');
            const extraDisplay = document.getElementById('extraServicesDisplay');
            const extraRow = document.getElementById('extraServicesRow');
            const finalDisplay = document.getElementById('finalTotalDisplay');

            function formatRupiah(number) {
                return 'Rp ' + number.toLocaleString('id-ID');
            }

            function updateTotal() {
                let extraTotal = 0;
                checkboxes.forEach(cb => {
                    if (cb.checked) extraTotal += parseInt(cb.value);
                });

                if (extraTotal > 0) {
                    extraRow.classList.remove('d-none');
                    extraDisplay.textContent = formatRupiah(extraTotal);
                } else {
                    extraRow.classList.add('d-none');
                }

                finalDisplay.textContent = formatRupiah(baseTotal + serviceFee + extraTotal);
            }

            checkboxes.forEach(cb => cb.addEventListener('change', updateTotal));
            updateTotal();

            document.querySelector('form').addEventListener('submit', function() {
                document.getElementById('hidden_catatan').value =
                    document.querySelector('textarea[name="catatan"]').value;

                const metode = document.querySelector('input[name="pay"]:checked');
                const labels = {
                    pay1: 'Saldo JasaKu (E-Wallet)',
                    pay2: 'Transfer Bank (Virtual Acc)',
                    pay3: 'COD (Bayar Ditempat)'
                };
                document.getElementById('hidden_metode').value =
                    labels[metode?.id] ?? 'Saldo JasaKu (E-Wallet)';

                const container = document.getElementById('hidden_extras_container');
                container.innerHTML = '';
                document.querySelectorAll('.extra-service:checked').forEach(cb => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'layanan_tambahan[]';
                    input.value = cb.value;
                    container.appendChild(input);
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>