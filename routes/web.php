<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

//

Route::get('/template', function () {
    return view('master-admin');
});
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard-admin');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/form-mitra', function () {
    return view('admin.mitra.form-mitra');
});
Route::get('/homeSlider-edit', function () {
    return view('admin.home-slider.edit');
});
Route::get('/homeSlider-create', function () {
    return view('admin.home-slider.create');
});
Route::get('/homeSlider-index', function () {
    return view('admin.home-slider.index');
});
Route::get('/faq-create', function () {
    return view('admin.faq.create');
});
Route::get('/faq-edit', function () {
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
