<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JasakuController;

Route::get('/', function () {
    return view('welcome');
});

// Halaman awal sebelum login
Route::get('/berandalogin', [JasakuController::class, 'berandalogin']);
Route::get('/profillogin', [JasakuController::class, 'profillogin']);

Route::middleware(['auth', 'verified'])->group(function () {

    // --- BERANDA ---
    Route::get('/beranda', [JasakuController::class, 'beranda'])->name('beranda');
    Route::post('/beranda', [JasakuController::class, 'storeberanda']);

    // --- TAMBAH BIODATA --- ← TAMBAHKAN INI
    Route::get('/tambah-biodata', [JasakuController::class, 'tambahBiodata'])->name('tambah.biodata');
    Route::post('/tambah-biodata', [JasakuController::class, 'storeBiodata'])->name('store.biodata');

    // --- PROFIL ---
    Route::get('/profil', [JasakuController::class, 'profil']);
    Route::post('/profil', [JasakuController::class, 'storeprofil']);
    Route::get('/profil/{id}/edit', [JasakuController::class, 'edit']);
    Route::put('/profil/{id}', [JasakuController::class, 'update']);

    // --- JASA (MULAI JUAL) ---
    Route::get('/mulai_jual_jasa', [JasakuController::class, 'mulai_jual_jasa']);
    Route::get('/tambah', [JasakuController::class, 'createtambah']);
    Route::post('/tambah', [JasakuController::class, 'storetambah']);
    Route::get('/edit-jasa/{id}', [JasakuController::class, 'editjasa']);
    Route::put('/edit-jasa/{id}', [JasakuController::class, 'updatejasa']);
    Route::delete('/edit-jasa/{id}', [JasakuController::class, 'destroy']);
    Route::delete('/delete-jasa/{id}', [JasakuController::class, 'destroy']);

    // --- SPESIFIKASI PRODUK ---
    Route::get('/spesifikasi_produk/{id}', [JasakuController::class, 'spesikasiproduk']);

    // --- KERANJANG ---
    Route::get('/keranjang', [JasakuController::class, 'keranjang']);
    Route::post('/keranjang', [JasakuController::class, 'storekeranjang']);
    Route::delete('/keranjang/{id}', [JasakuController::class, 'deleteKeranjang']);

    // --- CHECKOUT & INVOICE ---
    Route::get('/checkout', [JasakuController::class, 'checkout']);
    Route::get('/invoice', [JasakuController::class, 'invoice']);
    Route::post('/invoice', [JasakuController::class, 'invoice']);
    // --- ULASAN ---
    Route::get('/ulasan', [JasakuController::class, 'ulasan']);
    Route::get('/form_ulasan/{id}', [JasakuController::class, 'formulasan']);
    Route::post('/simpan-ulasan', [JasakuController::class, 'simpanUlasan']);
    Route::post('/ulasan', [JasakuController::class, 'simpanUlasan']);

    // --- RINCIAN PESANAN ---
    Route::get('/rincian_pesanan', [JasakuController::class, 'rincian_pesanan']);

    Route::post('/tambah_biodata', [JasakuController::class, 'storeBiodata']);
    Route::get('/edit-biodata/{id}', [JasakuController::class, 'editbiodata']);
    Route::post('/edit-biodata/{id}', [JasakuController::class, 'updatebiodata']);

    // --- PROFILE BREEZE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
