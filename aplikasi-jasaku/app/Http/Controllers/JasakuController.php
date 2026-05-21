<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JasakuController extends Controller
{
    // 1. Menampilkan file berandalogin.blade.php (sebelum login)
    public function berandalogin()
    {
        $jasa = DB::table('tb_jasa')->get();
        return view('berandalogin', compact('jasa')); // dikirim ke index / view   
    }

    public function mulai_jual_jasa()
    {
        $jasa = DB::table('tb_jasa')->get();
        return view('mulai_jual_jasa', compact('jasa')); // dikirim ke index / view   
    }


    // JasakuController.php
    public function tambahBiodata()
    {
        $profil = DB::table('tb_profil')
            ->where('user_id', auth()->id())
            ->first();

        // Kalau profil sudah lengkap, langsung ke beranda
        if ($profil && $profil->no_telepon && $profil->alamat) {
            return redirect()->route('beranda');
        }

        // Kalau belum ada / belum lengkap, tampilkan form
        return view('tambah-biodata');
    }

    public function tambah()
    {
        $jasa = DB::table('tb_jasa')->get();
        return view('tambah', compact('jasa')); // dikirim ke index / view   
    }

    // 1. Menampilkan file berandalogin.blade.php (sebelum login)
    public function profillogin()
    {
        $jasa = DB::table('tb_profil')->get();
        return view('profillogin', compact('jasa')); // dikirim ke index / view   
    }

    public function profil()
    {
        $jasa = DB::table('tb_profil')->limit(1)->get();
        return view('profil', compact('jasa')); // dikirim ke index / view   
    }

    public function beranda()
    {
        // Mengambil semua data jasa (untuk di-looping di card)
        $jasa = DB::table('tb_jasa')->get();

        // Mengambil satu data profil saja (untuk identitas pemilik di card)
        // Gunakan first() agar menghasilkan Object, bukan Collection
        $profil = DB::table('tb_profil')->first();

        return view('beranda', compact('jasa', 'profil'));
    }

    public function storeberanda(Request $request)
    {

        DB::table('tb_jasa')->insert([
            'nama_jasa' => $request->nama_jasa,
            'kategori_jasa' => $request->kategori_jasa,
            'deskripsi' => $request->deskripsi,
            'estimasi_pengerjaan' => $request->estimasi_pengerjaan,
            'harga' => $request->harga,
        ]);
        return redirect('beranda');
    }

    public function indexUlasan()
    {
        $dataUlasan = DB::table('tb_ulasan')
            ->join('tb_jasa', 'tb_ulasan.id_jasa', '=', 'tb_jasa.id_jasa')
            ->select('tb_ulasan.*', 'tb_jasa.nama_jasa', 'tb_jasa.kategori_jasa')
            ->where('tb_ulasan.user_id', auth()->id())
            ->get();

        $jasa = DB::table('tb_jasa')->get();

        return view('ulasan_saya', compact('dataUlasan', 'jasa'));
    }


    public function ulasan()
    {
        $jasa = DB::table('tb_jasa')->get();

        $dataUlasan = DB::table('tb_ulasan')
            ->join('tb_jasa', 'tb_ulasan.id_jasa', '=', 'tb_jasa.id_jasa')
            ->select('tb_ulasan.*', 'tb_jasa.nama_jasa')
            ->get();

        return view('ulasan', compact('jasa', 'dataUlasan'));
    }


    public function rincian_pesanan()
    {
        $jasa = DB::table('tb_transaksi')
            ->join('tb_jasa', 'tb_transaksi.id_jasa', '=', 'tb_jasa.id_jasa')
            ->where('tb_transaksi.id_profil', auth()->id())
            ->select('tb_transaksi.*', 'tb_jasa.nama_jasa', 'tb_jasa.foto', 'tb_jasa.kategori_jasa', 'tb_jasa.harga')
            ->get();


        return view('rincian_pesanan', compact('jasa'));
    }

    public function invoice(Request $request)
    {
        $profil = DB::table('tb_profil')
            ->where('user_id', auth()->id())
            ->first();

        if ($request->isMethod('post')) {
            // Ambil keranjang DULU sebelum dihapus
            $jasa = DB::table('tb_keranjang')
                ->where('id_profil', auth()->id())
                ->get();


            $total = $jasa->sum(function ($item) {
                return $item->harga * $item->qty;
            });

            // Simpan ke transaksi
            foreach ($jasa as $item) {
                DB::table('tb_transaksi')->insert([
                    'id_profil'   => auth()->id(),
                    'id_jasa'     => $item->id_jasa,
                    'alamat'      => $profil->alamat ?? '-',
                    'total_bayar' => $item->harga * $item->qty,
                ]);
            }

            // Hapus keranjang SETELAH tersimpan
            DB::table('tb_keranjang')
                ->where('id_profil', auth()->id())
                ->delete();

            session([
                'invoice_catatan' => $request->catatan,
                'invoice_metode'  => $request->metode_bayar,
                'invoice_layanan' => $request->layanan_tambahan ?? [],
            ]);
        } else {
            // GET biasa
            $jasa = DB::table('tb_keranjang')
                ->where('id_profil', auth()->id())
                ->get();

            $total = $jasa->sum(function ($item) {
                return $item->harga * $item->qty;
            });
        }

        return view('invoice', compact('jasa', 'total', 'profil'));
    }

    public function keranjang()
    {
        $jasa = DB::table('tb_keranjang')
            ->where('id_profil', auth()->id())
            ->get();

        // hitung total dari collection (LEBIH AMAN)
        $total = $jasa->sum(function ($item) {
            return $item->harga * $item->qty;
        });

        return view('keranjang', compact('jasa', 'total'));
    }

public function checkout()
{
    $jasa = DB::table('tb_keranjang')
        ->where('id_profil', auth()->id())
        ->get();

    $total = $jasa->sum(function ($item) {
        return $item->harga * $item->qty;
    });

    // HAPUS BARIS DELETE INI
    // DB::table('tb_keranjang')
    //     ->where('id_profil', auth()->id())
    //     ->delete();

    return view('checkout', compact('jasa', 'total'));
}    public function formulasan($id)
    {
        $jasa = DB::table('tb_jasa')
            ->where('id_jasa', $id)
            ->first();

        if (!$jasa) {
            abort(404);
        }

        return view('form_ulasan', compact('jasa'));
    }

    public function simpanUlasan(Request $request)
    {
        $request->validate([
            'id_jasa' => 'required',
            'ulasan'  => 'required|string',
        ]);

        DB::table('tb_ulasan')->insert([
            'id_jasa'  => $request->id_jasa,
            'username' => auth()->user()->name,
            'ulasan'   => $request->ulasan,
        ]);

        return redirect('/ulasan')->with('success', 'Ulasan berhasil dikirim!');
    }

    public function createtambah()
    {
        return view('tambah');
    }


    public function storelogin(Request $request)
    {
        DB::table('tb_profil')->insert([
            'nama' => $request->nama,
            'kata_sandi' => $request->kata_sandi,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);
        return redirect('profil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeprofil(Request $request)
    {
        DB::table('tb_profil')->insert([
            'user_id'    => auth()->id(), // ← tambahkan ini
            'nama'       => $request->nama,
            'kata_sandi' => $request->kata_sandi,
            'no_telepon' => $request->no_telepon,
            'alamat'     => $request->alamat,
        ]);
        return redirect('profil');
    }

    public function storeBiodata(Request $request)
    {
        DB::table('tb_profil')->insert([
            'user_id'    => auth()->id(),
            'nama'       => $request->nama,
            'no_telepon' => $request->no_telepon,
            'alamat'     => $request->alamat,
        ]);

        return redirect()->route('beranda');
    }

    public function storekeranjang(Request $request)
    {
        $jasa = DB::table('tb_jasa')
            ->where('id_jasa', $request->id_jasa)
            ->first();

        if (!$jasa) {
            return back()->with('error', 'Jasa tidak ditemukan');
        }

        // Cek apakah sudah ada di keranjang
        $existing = DB::table('tb_keranjang')
            ->where('id_profil', auth()->id())
            ->where('id_jasa', $jasa->id_jasa)
            ->first();

        if ($existing) {
            // Kalau sudah ada, update qty saja
            DB::table('tb_keranjang')
                ->where('id_keranjang', $existing->id_keranjang)
                ->update(['qty' => $existing->qty + ($request->qty ?? 1)]);
        } else {
            // Kalau belum ada, insert baru
            DB::table('tb_keranjang')->insert([
                'id_profil'     => auth()->id(), // ← pastikan ini
                'id_jasa'       => $jasa->id_jasa,
                'kategori_jasa' => $jasa->kategori_jasa,
                'nama_jasa'     => $jasa->nama_jasa,
                'harga'         => $jasa->harga,
                'foto'          => $jasa->foto,
                'qty'           => $request->qty ?? 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        return redirect('/keranjang');
    }

    public function storetambah(Request $request)
    {
        $path = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('barang', $filename, 'public');
        }

        DB::table('tb_jasa')->insert([
            'nama_jasa' => $request->nama_jasa,
            'kategori_jasa' => $request->kategori_jasa,
            'deskripsi' => $request->deskripsi,
            'estimasi_pengerjaan' => $request->estimasi_pengerjaan,
            'harga' => $request->harga,
            'foto' => $path, // ✅ simpan path file
        ]);

        return redirect('mulai_jual_jasa');
    }

    public function spesikasiproduk($id)
    {
        // ambil data jasa dulu
        $jasa = DB::table('tb_jasa')->where('id_jasa', $id)->first();

        // baru ambil ulasan
        $ulasan = DB::table('tb_ulasan')
            ->where('id_jasa', $jasa->id_jasa)
            ->get();

        return view('spesifikasi_produk', compact('jasa', 'ulasan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jasa = DB::table('tb_jasa')->where('id_jasa', $id)->first();

        if (!$jasa) abort(404);

        $ulasan = DB::table('tb_ulasan')->where('id_jasa', $id)->get();

        return view('spesifikasi_produk', compact('jasa', 'ulasan'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $jasa = DB::table('tb_profil')
            ->where('id', $id)
            ->first();

        return view('profil', compact('jasa'));
    }

    public function editjasa(string $id)
    {
        //
        $jasa = DB::table('tb_jasa')
            ->where('id_jasa', $id)
            ->first();

        return view('edit-jasa', compact('jasa'));
    }

    public function editbiodata(string $id)
    {
        $profil = DB::table('tb_profil')
            ->where('user_id', $id)
            ->first();

        // Kalau profil belum ada, buat object kosong
        // agar form tetap bisa tampil dan tidak 404
        if (!$profil) {
            $profil = (object)[
                'user_id'    => $id,
                'no_telepon' => '',
                'alamat'     => '',
            ];
        }

        return view('edit_biodata', compact('profil'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('tb_profil') // nama table
            ->where('id', $id) // kolom database
            ->update([
                'nama' => $request->nama,
                'kata_sandi' => $request->kata_sandi,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
            ]);

        // redirect
        return redirect('/profil');
    }

    public function updatejasa(Request $request, string $id)
    {
        // 1. Ambil data lama (untuk hapus foto lama jika ada update)
        $jasa = DB::table('tb_jasa')->where('id_jasa', $id)->first();

        // 2. Siapkan data teks yang akan diupdate
        $updateData = [
            'nama_jasa' => $request->nama_jasa,
            'kategori_jasa' => $request->kategori_jasa,
            'deskripsi' => $request->deskripsi,
            'estimasi_pengerjaan' => $request->estimasi_pengerjaan,
            'harga' => $request->harga,
        ];

        // 3. LOGIKA FOTO: Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage agar tidak memenuhi memori
            if ($jasa->foto && \Storage::exists('public/' . $jasa->foto)) {
                \Storage::delete('public/' . $jasa->foto);
            }

            // Simpan foto baru ke folder 'jasa-images' di storage/app/public
            $path = $request->file('foto')->store('jasa-images', 'public');

            // Masukkan path foto baru ke array data update
            $updateData['foto'] = $path;
        }

        // 4. Proses update ke database
        DB::table('tb_jasa')
            ->where('id_jasa', $id)
            ->update($updateData);

        return redirect('/mulai_jual_jasa')->with('success', 'Jasa berhasil diperbarui!');
    }

    public function updatebiodata(Request $request, string $id)
    {
        $request->validate([
            'no_telepon' => 'required',
            'alamat'     => 'required',
        ]);

        DB::table('tb_profil')
            ->where('user_id', $id)
            ->update([
                'no_telepon' => $request->no_telepon,
                'alamat'     => $request->alamat,
            ]);

        // ✅ Redirect ke profil, bukan edit-biodata tanpa id
        return redirect('/profil')->with('success', 'Biodata berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tb_jasa')->where('id_jasa', $id)->delete();
        return redirect('/mulai_jual_jasa');
    }

    public function deleteKeranjang($id)
    {
        DB::table('tb_keranjang')
            ->where('id_keranjang', $id)
            ->where('id_profil', auth()->id()) // biar aman (user hanya hapus miliknya)
            ->delete();

        return redirect('/keranjang')->with('success', 'Item berhasil dihapus');
    }
}
