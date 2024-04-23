<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;

// Menu Tambah Admin
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Menu Login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Home Slider
Route::get('/homeslider', [HomeSliderController::class, 'index'])->name('homeslider.index');
Route::get('/homeslider-create', [HomeSliderController::class, 'create'])->name('home-slider.create');
Route::post('/homeslider', [HomeSliderController::class, 'store'])->name('home-slider.store');
Route::get('/homeslider-{id}', [HomeSliderController::class, 'edit'])->name('homeslider.edit');
Route::put('/homeslider-{id}', [HomeSliderController::class, 'update'])->name('homeslider.update');
Route::delete('/homeslider-{id}', [HomeSliderController::class, 'destroy'])->name('homeslider.destroy');

// Mitra
Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
Route::get('/mitra-create', [MitraController::class, 'create'])->name('mitra.create');
Route::post('/mitra', [MitraController::class, 'store'])->name('mitra.store');
Route::get('/mitra-{id}', [MitraController::class, 'edit'])->name('mitra.edit');
Route::put('/mitra-{id}', [MitraController::class, 'update'])->name('mitra.update');
Route::delete('/mitra-{id}', [MitraController::class, 'destroy'])->name('mitra.destroy');
//Home
Route::get('/', [HomeController::class, 'index']);

Route::get('/admin', function () {
    return view('master-admin');
});

Route::get('/form-berita', function () {
    return view('admin.berita.form-berita');
});

Route::get('/profile-admin', function () {
    return view('auth.profile-admin');
});

Route::get('/download', function () {
    return view('download');
});
Route::get('/profile', function () {
    return view('profil-section.profile');
});
Route::get('/tupoksi-visi-misi', function () {
    return view('profil-section.tupoksiVM');
});
Route::get('/struktur-organisasi', function () {
    return view('profil-section.strukturOrg');
});
Route::get('/kontak', function () {
    return view('profil-section.kontak');
});
Route::get('/persyaratan', function () {
    return view('standar-section.persyaratan');
});
Route::get('/detail-persyaratan', function () {
    return view('standar-section.detailPersyaratan');
});
Route::get('/detail-download', function () {
    return view('standar-section.detailDownload');
});
Route::get('/faq', function () {
    return view('faq');
});
