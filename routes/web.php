<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;


use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'home'])->name('home');
Route::get('/informasi-sekolah', function () {
    return view('informasi-sekolah');
})->name('informasi');

Route::get('/berita',[BeritaController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/ps',[ProfilSekolahController::class, 'ps'])->name('ps');
Route::get('/guru',[GuruController::class, 'guru'])->name('guru');

Route::get('/siswa',[SiswaController::class, 'siswa'])->name('siswa');

Route::get('/galeri',[GaleriController::class, 'galeri'])->name('galeri');

Route::get('/ekskul/{id}', [EkstrakulikulerController::class, 'show'])->name('ekskul.show');
Route::get('/ekskul',[EkstrakulikulerController::class, 'ekskul'])->name('ekskul');

Route::middleware('auth')->prefix('Admin')->name('Admin.')->group(function () {
    // Tambahkan route admin lainnya di sini
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/user/delete/{id}',[UserController::class, 'destroy'])->name('user.delete');
    Route::post('/user/store',[UserController::class, 'store'])->name('user.store');
    Route::post('/user/update/{id}',[UserController::class, 'update'])->name('user.update');
    Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
    Route::get('/user',[UserController::class, 'index'])->name('user.index');

    Route::get('/berita/delete/{id}',[BeritaController::class, 'destroy'])->name('berita.delete');
    Route::post('/berita/store',[BeritaController::class, 'store'])->name('berita.store');
    Route::post('/berita/update/{id}',[BeritaController::class, 'update'])->name('berita.update');
    Route::get('/berita/edit/{id}',[BeritaController::class, 'edit'])->name('berita.edit');
    Route::get('/berita/create',[BeritaController::class, 'create'])->name('berita.create');
    Route::get('/berita-admin',[BeritaController::class, 'index'])->name('berita.index');

    Route::get('/ps/delete/{id}',[ProfilSekolahController::class, 'destroy'])->name('ps.delete');
    Route::post('/ps/store',[ProfilSekolahController::class, 'store'])->name('ps.store');
    Route::post('/ps/update/{id}',[ProfilSekolahController::class, 'update'])->name('ps.update');
    Route::get('/ps/edit/{id}',[ProfilSekolahController::class, 'edit'])->name('ps.edit');
    Route::get('/ps/create',[ProfilSekolahController::class, 'create'])->name('ps.create');
    Route::get('/ps-admin',[ProfilSekolahController::class, 'index'])->name('ps.index');

    Route::get('/siswa/delete/{id}',[SiswaController::class, 'destroy'])->name('siswa.delete');
    Route::post('/siswa/store',[SiswaController::class, 'store'])->name('siswa.store');
    Route::post('/siswa/update/{id}',[SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/siswa/edit/{id}',[SiswaController::class, 'edit'])->name('siswa.edit');
    Route::get('/siswa/create',[SiswaController::class, 'create'])->name('siswa.create');
    Route::get('/siswa-admin',[SiswaController::class, 'index'])->name('siswa.index');

    Route::get('/guru/delete/{id}',[GuruController::class, 'destroy'])->name('guru.delete');
    Route::post('/guru/store',[GuruController::class, 'store'])->name('guru.store');
    Route::post('/guru/update/{id}',[GuruController::class, 'update'])->name('guru.update');
    Route::get('/guru/edit/{id}',[GuruController::class, 'edit'])->name('guru.edit');
    Route::get('/guru/create',[GuruController::class, 'create'])->name('guru.create');
    Route::get('/guru-admin',[GuruController::class, 'index'])->name('guru.index');

    Route::get('/galeri/delete/{id}',[GaleriController::class, 'destroy'])->name('galeri.delete');
    Route::post('/galeri/store',[GaleriController::class, 'store'])->name('galeri.store');
    Route::post('/galeri/update/{id}',[GaleriController::class, 'update'])->name('galeri.update');
    Route::get('/galeri/edit/{id}',[GaleriController::class, 'edit'])->name('galeri.edit');
    Route::get('/galeri/create',[GaleriController::class, 'create'])->name('galeri.create');
    Route::get('/galeri-admin',[GaleriController::class, 'index'])->name('galeri.index');

    Route::get('/ekskul/delete/{id}',[EkstrakulikulerController::class, 'destroy'])->name('ekskul.delete');
    Route::post('/ekskul/store',[EkstrakulikulerController::class, 'store'])->name('ekskul.store');
    Route::post('/ekskul/update/{id}',[EkstrakulikulerController::class, 'update'])->name('ekskul.update');
    Route::get('/ekskul/edit/{id}',[EkstrakulikulerController::class, 'edit'])->name('ekskul.edit');
    Route::get('/ekskul/create',[EkstrakulikulerController::class, 'create'])->name('ekskul.create');
    Route::get('/ekskul-admin',[EkstrakulikulerController::class, 'index'])->name('ekskul.index');
    // Route::get('/',[EkstrakulikulerController::class, 'home'])->name('home');
});


Route::middleware(['auth', 'cekLevel:Operator'])->prefix('Operator')->name('Operator.')->group(function () {

//     // Dashboard Operator
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

