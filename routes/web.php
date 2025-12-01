<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfilController;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil
Route::get('/profil', function () {
    return view('profil.index');
});

// ROUTE UNTUK CRUD SISWA
Route::resource('siswa', SiswaController::class);

// ROUTE UNTUK CRUD GURU
Route::resource('guru', GuruController::class);

// ROUTE UNTUK CRUD BERITA - dengan parameter explicit
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

Route::resource('pengumuman', PengumumanController::class);
Route::resource('prestasi', PrestasiController::class);
Route::resource('kelas', KelasController::class);
Route::resource('ekstrakurikuler', EkstrakurikulerController::class);
Route::resource('mapel', MapelController::class);
Route::resource('nilai', NilaiController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('profil', ProfilController::class);