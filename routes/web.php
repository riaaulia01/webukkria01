<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\FotoEkstrakurikulerController;
use App\Http\Controllers\GuruStaffController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranEkstrakurikulerController;
use App\Http\Controllers\PendaftaranJurusanController;
use App\Http\Controllers\AdminPendaftaranJurusanController;


// =========================
// HALAMAN WEBSITE PUBLIK
// =========================

Route::get('/', [BerandaController::class, 'index'])
    ->name('home');

Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])
    ->name('profil');


// =========================
// JURUSAN PUBLIK
// =========================

Route::get('/jurusan', [JurusanController::class, 'index'])
    ->name('jurusan');

Route::get('/jurusan/{id}/daftar', [JurusanController::class, 'daftar'])
    ->name('jurusan.daftar');

Route::post('/jurusan/{id}/daftar', [PendaftaranJurusanController::class, 'store'])
    ->name('jurusan.daftar.simpan');

Route::get('/jurusan/{id}', [JurusanController::class, 'show'])
    ->name('jurusan.show');


// =========================
// EKSTRAKURIKULER PUBLIK
// =========================

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])
    ->name('ekstrakurikuler');

Route::get('/ekstrakurikuler/{id}/daftar', [EkstrakurikulerController::class, 'daftar'])
    ->name('ekstrakurikuler.daftar');

Route::post('/ekstrakurikuler/{id}/daftar', [EkstrakurikulerController::class, 'simpanPendaftaran'])
    ->name('ekstrakurikuler.daftar.simpan');

Route::get('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'show'])
    ->name('ekstrakurikuler.show');


// =========================
// GURU, GALERI, KONTAK PUBLIK
// =========================

Route::get('/guru-staff', [GuruStaffController::class, 'index'])
    ->name('guru-staff');

Route::get('/galeri', [GaleriController::class, 'index'])
    ->name('galeri');

Route::get('/kontak', [KontakController::class, 'index'])
    ->name('kontak');

Route::post('/kontak', [KontakController::class, 'kirim'])
    ->name('kontak.kirim');


// =========================
// ADMIN LOGIN
// =========================

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'prosesLogin'])
    ->name('admin.login.proses');


// =========================
// SEMUA ROUTE ADMIN
// WAJIB LOGIN ADMIN
// =========================

Route::middleware('admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // =========================
    // DASHBOARD
    // =========================

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');


    // =========================
    // ADMIN PROFIL SEKOLAH
    // =========================

    Route::get('/profil', [ProfilSekolahController::class, 'edit'])
        ->name('profil.edit');

    Route::put('/profil', [ProfilSekolahController::class, 'update'])
        ->name('profil.update');


    // =========================
    // ADMIN BERANDA
    // =========================

    Route::get('/beranda', [AdminController::class, 'editBeranda'])
        ->name('beranda.edit');

    Route::put('/beranda', [AdminController::class, 'updateBeranda'])
        ->name('beranda.update');


    // =========================
    // LOGOUT
    // =========================

    Route::get('/logout', [AdminController::class, 'logout'])
        ->name('logout');


    // =========================
    // CRUD GURU & STAFF
    // =========================

    Route::get('/guru-staff', [GuruStaffController::class, 'adminIndex'])
        ->name('guru-staff.index');

    Route::get('/guru-staff/create', [GuruStaffController::class, 'create'])
        ->name('guru-staff.create');

    Route::post('/guru-staff', [GuruStaffController::class, 'store'])
        ->name('guru-staff.store');

    Route::get('/guru-staff/{guru}/edit', [GuruStaffController::class, 'edit'])
        ->name('guru-staff.edit');

    Route::put('/guru-staff/{guru}', [GuruStaffController::class, 'update'])
        ->name('guru-staff.update');

    Route::delete('/guru-staff/{guru}', [GuruStaffController::class, 'destroy'])
        ->name('guru-staff.destroy');


    // =========================
    // CRUD JURUSAN
    // =========================

    Route::get('/jurusan', [JurusanController::class, 'adminIndex'])
        ->name('jurusan.index');

    Route::get('/jurusan/create', [JurusanController::class, 'create'])
        ->name('jurusan.create');

    Route::post('/jurusan', [JurusanController::class, 'store'])
        ->name('jurusan.store');

    Route::get('/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])
        ->name('jurusan.edit');

    Route::put('/jurusan/{jurusan}', [JurusanController::class, 'update'])
        ->name('jurusan.update');

    Route::delete('/jurusan/{jurusan}', [JurusanController::class, 'destroy'])
        ->name('jurusan.destroy');


    // =========================
    // CRUD EKSTRAKURIKULER
    // =========================

    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'adminIndex'])
        ->name('ekstrakurikuler.index');

    Route::get('/ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])
        ->name('ekstrakurikuler.create');

    Route::post('/ekstrakurikuler', [EkstrakurikulerController::class, 'store'])
        ->name('ekstrakurikuler.store');

    Route::get('/ekstrakurikuler/{ekstrakurikuler}/edit', [EkstrakurikulerController::class, 'edit'])
        ->name('ekstrakurikuler.edit');

    Route::put('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'update'])
        ->name('ekstrakurikuler.update');


    // =========================
    // FOTO KEGIATAN EKSTRAKURIKULER
    // =========================

    Route::post(
        '/ekstrakurikuler/{ekstrakurikuler}/foto',
        [FotoEkstrakurikulerController::class, 'store']
    )->name('ekstrakurikuler.foto.upload');

    Route::delete(
        '/ekstrakurikuler/foto/{id}',
        [FotoEkstrakurikulerController::class, 'destroy']
    )->name('ekstrakurikuler.foto.hapus');


    // =========================
    // HAPUS EKSTRAKURIKULER
    // =========================

    Route::delete(
        '/ekstrakurikuler/{ekstrakurikuler}',
        [EkstrakurikulerController::class, 'destroy']
    )->name('ekstrakurikuler.destroy');


    // =========================
    // PENDAFTAR EKSTRAKURIKULER
    // =========================

    Route::get(
        '/pendaftaran-ekstrakurikuler',
        [PendaftaranEkstrakurikulerController::class, 'index']
    )->name('pendaftaran-ekstrakurikuler.index');


    // =========================
    // PENDAFTAR JURUSAN
    // =========================

    Route::get(
        '/pendaftaran-jurusan',
        [AdminPendaftaranJurusanController::class, 'index']
    )->name('pendaftaran-jurusan.index');

    Route::delete(
        '/pendaftaran-jurusan/{id}',
        [AdminPendaftaranJurusanController::class, 'destroy']
    )->name('pendaftaran-jurusan.destroy');


    // =========================
    // CRUD GALERI
    // =========================

    Route::get('/galeri', [GaleriController::class, 'adminIndex'])
        ->name('galeri.index');

    Route::get('/galeri/create', [GaleriController::class, 'create'])
        ->name('galeri.create');

    Route::post('/galeri', [GaleriController::class, 'store'])
        ->name('galeri.store');

    Route::get('/galeri/{galeri}/edit', [GaleriController::class, 'edit'])
        ->name('galeri.edit');

    Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])
        ->name('galeri.update');

    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])
        ->name('galeri.destroy');

});
