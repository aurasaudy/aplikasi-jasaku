<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - INV/{{ date('Ymd') }}/SRV/{{ str_pad($order_id ?? '1', 3, '0', STR_PAD_LEFT) }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        @media print {
            .d-print-none {
                display: none !important;
            }

            body {
                background-color: white !important;
            }

            .card {
                shadow: none !important;
                border: none !important;
            }
        }
    </style>
</head>

<body class="bg-light text-dark" style="font-family: system-ui, -apple-system, sans-serif;">

    <div class="container py-3 py-md-5">
        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mb-3 d-print-none mx-auto" style="max-width: 850px;">
            <a href="{{ url('/rincian_pesanan') }}" class="btn btn-outline-secondary shadow-sm rounded-pill px-4 fw-medium">
                <i class="bi bi-house-door-fill me-2"></i> Pesanan
            </a>
            <button onclick="window.print()" class="btn btn-primary shadow-sm rounded-pill px-4 fw-medium">
                <i class="bi bi-printer-fill me-2"></i> Cetak Invoice
            </button>
        </div>

        <!-- Container Invoice Utama -->
        <div class="card border-0 shadow-sm rounded-4 mx-auto position-relative overflow-hidden bg-white" style="max-width: 850px;">

            <!-- Status Watermark (Lunas) -->
            <div class="text-primary opacity-25 px-5 py-3 text-center d-flex align-items-center justify-content-center w-100 h-100" style="position: absolute; top: 0; left: 0; transform: rotate(-25deg); font-size: clamp(3rem, 12vw, 7rem); font-weight: 900; letter-spacing: 12px; z-index: 0; pointer-events: none; opacity: 0.07 !important;">
                <span style="border: 8px solid; padding: 10px 40px; border-radius: 2rem; border-color: currentColor;">LUNAS</span>
            </div>

            <div class="card-body p-3 p-md-5 position-relative z-1">

                <!-- Header Invoice -->
                <div class="row align-items-center mb-4 mb-md-5 pb-4 border-bottom border-primary border-opacity-25 border-3">
                    <div class="col-12 col-sm-6 text-center text-sm-start mb-3 mb-sm-0">
                        <h2 class="text-primary fw-bolder mb-0 d-flex align-items-center justify-content-center justify-content-sm-start">
                            <i class="bi bi-lightning-charge-fill fs-2 me-2"></i> JasaKu
                        </h2>
                        <p class="text-muted small mb-0 mt-1 fw-medium">Solusi Cepat Jasa Online Terpercaya</p>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        <h5 class="fw-bold text-uppercase text-secondary mb-1 small" style="letter-spacing: 2px;">Tagihan #</h5>
                        <span class="badge bg-primary fs-6 rounded-pill px-3 py-2 shadow-sm">
                            INV/{{ date('Ymd') }}/SRV/{{ str_pad($order_id ?? '1', 3, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>
                </div>

                <!-- Detail Pihak Terkait -->
                <div class="row mb-4 mb-md-5 gy-4">
                    <div class="col-12 col-md-5">
                        <p class="text-secondary fw-bold text-uppercase small mb-2 mb-md-3">
                            <i class="bi bi-wallet2 text-primary me-1"></i> Metode Pembayaran:
                        </p>
                        <div class="p-3 border rounded-3 bg-light bg-opacity-50">
                            <div class="fw-bold text-primary mb-1">
                                {{ session('invoice_metode') ?? 'Saldo JasaKu (E-Wallet)' }}
                            </div>
                            <div class="small text-muted">Status: Terbayar Otomatis</div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 border-start-md border-primary border-opacity-10">
                        <p class="text-secondary fw-bold text-uppercase small mb-2 mb-md-3">
                            <i class="bi bi-person-check text-primary me-1"></i> Tagihan Untuk:
                        </p>
                        <div class="row g-2 small">
                            <div class="col-4 col-sm-3 text-secondary">Pelanggan</div>
                            <div class="col-8 col-sm-9 fw-bold">: {{ Auth::user()->name ?? $profil->nama ?? 'Pelanggan' }}</div>

                            <div class="col-4 col-sm-3 text-secondary">Tanggal</div>
                            <div class="col-8 col-sm-9">: <span class="fw-medium">{{ date('d F Y') }}</span></div>

                            <div class="col-4 col-sm-3 text-secondary">No. Telepon</div>
                            <div class="col-8 col-sm-9">: <span class="fw-medium">{{ $profil->no_telepon ?? Auth::user()->no_telepon ?? '-' }}</span></div>

                            <div class="col-4 col-sm-3 text-secondary">Alamat</div>
                            <div class="col-8 col-sm-9">: <span class="fw-medium">{{ $profil->alamat ?? Auth::user()->alamat ?? '-' }}</span></div>

                            <div class="col-4 col-sm-3 text-secondary">Instruksi</div>
                            <div class="col-8 col-sm-9">:
                                <span class="fw-medium text-dark italic">
                                    "{{ session('invoice_catatan') ?? 'Tidak ada catatan khusus' }}"
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Layanan -->
                <div class="table-responsive mb-4 rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr class="text-secondary small text-uppercase">
                                <th class="py-3 px-3">Layanan</th>
                                <th class="py-3 text-end px-3">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- ✅ BARU --}}
                            @php
                            $layananTambahan = session('invoice_layanan', []);
                            $extra_cost = 0;
                            foreach($layananTambahan as $val) {
                            $extra_cost += (int)$val;
                            }
                            $subtotal = $total ?? 0;
                            $admin_fee = ($subtotal < 100000 && $subtotal> 0) ? 2000 : 5000;
                                @endphp
                                @forelse($jasa as $item)
                                <tr class="border-bottom">
                                    <td class="py-3 px-3">
                                        <div class="fw-bold text-primary mb-1">{{ $item->nama_jasa }}</div>
                                        <div class="text-muted small d-flex align-items-center">
                                            <i class="bi bi-tag me-1"></i> {{ $item->kategori_jasa ?? 'Layanan Digital' }}
                                        </div>
                                    </td>
                                    <td class="py-3 text-end fw-bold px-3">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                @endforelse

                                <!-- Tampilkan Layanan Tambahan Jika Ada -->
                                {{-- ✅ BARU --}}
                                @if(count($layananTambahan) > 0)
                                <tr class="bg-light bg-opacity-50">
                                    <td class="py-3 px-3">
                                        <div class="fw-bold text-dark small">
                                            <i class="bi bi-plus-circle-fill text-primary me-1"></i> Layanan Tambahan
                                        </div>
                                        <ul class="mb-0 small text-muted ps-3">
                                            @foreach($layananTambahan as $val)
                                            @if($val == 100000) <li>Pengerjaan Ekspres (2 Hari)</li> @endif
                                            @if($val == 50000) <li>Revisi Tanpa Batas</li> @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="py-3 text-end fw-bold px-3">Rp{{ number_format($extra_cost, 0, ',', '.') }}</td>
                                </tr>
                                @endif
                        </tbody>
                    </table>
                </div>

                <!-- Ringkasan Harga -->
                <div class="row g-4">
                    <!-- Jaminan (Kiri) -->
                    <div class="col-12 col-md-6 order-2 order-md-1">
                        <div class="p-3 bg-primary bg-opacity-10 rounded-3 text-primary border border-primary border-opacity-25 h-100">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-shield-check fs-4 me-2"></i>
                                <div>
                                    <strong class="d-block mb-1 text-uppercase small fw-bold">Jaminan Transaksi</strong>
                                    <p class="small mb-0 opacity-75">Pembayaran ini dipegang oleh JasaKu Escrow dan hanya akan cair ke penjual setelah Anda mengonfirmasi pekerjaan selesai.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kalkulasi (Kanan) -->
                    <div class="col-12 col-md-6 order-1 order-md-2 text-md-end">
                        <div class="row g-2 small">
                            <div class="col-7 col-md-8 text-secondary">Subtotal Layanan :</div>
                            <div class="col-5 col-md-4 fw-bold">Rp{{ number_format($subtotal, 0, ',', '.') }}</div>

                            @if($extra_cost > 0)
                            <div class="col-7 col-md-8 text-secondary">Add-ons :</div>
                            <div class="col-5 col-md-4 fw-bold">Rp{{ number_format($extra_cost, 0, ',', '.') }}</div>
                            @endif

                            <div class="col-7 col-md-8 text-secondary">Biaya Layanan :</div>
                            <div class="col-5 col-md-4 fw-bold">Rp{{ number_format($admin_fee, 0, ',', '.') }}</div>

                            <div class="col-12 my-2 border-bottom"></div>

                            <div class="col-7 col-md-8 h5 fw-bolder text-primary mb-0">Total Bayar :</div>
                            <div class="col-5 col-md-4 h5 fw-bolder text-primary mb-0">Rp{{ number_format($subtotal + $extra_cost + $admin_fee, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-5 text-center border-top pt-4">
                    <p class="text-muted small">Terima kasih telah menggunakan JasaKu. Pesanan Anda sedang diproses oleh tim kami.</p>
                    <p class="text-muted" style="font-size: 10px;">Dicetak pada: {{ date('d/m/Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>