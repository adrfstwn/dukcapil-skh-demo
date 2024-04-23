<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeSliderController;

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
Route::get('/home-slider/{id}', [HomeSliderController::class, 'show'])->name('home-slider.show');
Route::get('/home-slider/{id}/edit', [HomeSliderController::class, 'edit'])->name('home-slider.edit');
Route::put('/home-slider/{id}', [HomeSliderController::class, 'update'])->name('home-slider.update');
Route::delete('/home-slider/{id}', [HomeSliderController::class, 'destroy'])->name('home-slider.destroy');


Route::get('/dashboard-admin', function () {
    return view('admin.dashboard-admin');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/mitra', function () {
    return view('admin.mitra.index');
});
Route::get('/mitra/create', function () {
    return view('admin.mitra.create');
});

Route::get('/faq/create', function () {
    return view('admin.faq.create');
});
Route::get('/faq/edit/{id}', function () {
    return view('admin.faq.edit');
});
Route::get('/faq-index', function () {
    return view('admin.faq.index');
});
Route::get('/mitra-create', function () {
    return view('admin.mitra.create');
});
Route::get('/mitra-edit', function () {
    return view('admin.mitra.edit');
});
Route::get('/mitra-index', function () {
    return view('admin.mitra.index');
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
