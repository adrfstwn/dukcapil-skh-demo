<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\FAQController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LinksosController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TupoksiController;
use App\Http\Controllers\StrukturOrgController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\DetailDownloadController;
use App\Http\Controllers\DetailPersyaratanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\KontenSubMenuController;

//Home
Route::get('/', [HomeController::class, 'index']);

// Konten Submenu
Route::get('/kontene', [KontenSubMenuController::class, 'show'])->name('konten.show');

// Menu Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/auth', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// FAQ
Route::get('/faq-show', [FAQController::class, 'show'])->name('faq.show');

// Download
Route::get('/download', [DownloadController::class, 'show'])->name('download.tampil');

//Profil
Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');

//kontak
Route::get('/kontak', [KontakController::class, 'show'])->name('kontak.show');
Route::get('/kontak', [JamController::class, 'show'])->name('jam.show');
Route::get('/kontak', [LinksosController::class, 'show'])->name('linksos.show');

// Tupoksi
Route::get('/tupoksi', [TupoksiController::class, 'show'])->name('tupoksi.show');

// Struktur Organisasi
Route::get('/struktur-organisasi', [StrukturOrgController::class, 'show'])->name('strukturorg.show');

// Persyaratan
Route::get('/persyaratan', [PersyaratanController::class, 'show'])->name('persyaratan.show');

// Profil
Route::get('/profile', [ProfilController::class, 'show'])->name('profil.show');

// Detail-Download
Route::get('/detail-download', [DetailDownloadController::class, 'show'])->name('detaildownload.show');

// Detail-Persyaratan
Route::get('/detail-persyaratan', [DetailPersyaratanController::class, 'show'])->name('detailpersyaratan.show');

// Berita
Route::get('/beritane', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/beritane-{id}', [BeritaController::class, 'showDetail'])->name('berita.detail');

// Middleware
Route::group(['middleware' => ['auth', AdminMiddleware::class]], function () {

    //Menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu-create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu-{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu-{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu-{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    //Sub Menu
    Route::get('/submenu', [SubmenuController::class, 'index'])->name('submenu.index');
    Route::get('/submenu-create', [SubmenuController::class, 'create'])->name('submenu.create');
    Route::post('/submenu', [SubmenuController::class, 'store'])->name('submenu.store');
    Route::get('/submenu-{id}', [SubmenuController::class, 'edit'])->name('submenu.edit');
    Route::put('/submenu-{id}', [SubmenuController::class, 'update'])->name('submenu.update');
    Route::delete('/submenu-{id}', [SubmenuController::class, 'destroy'])->name('submenu.destroy');

    //Konten Sub Menu
    Route::get('/konten', [KontenSubMenuController::class, 'index'])->name('konten.index');
    Route::get('/konten-create', [KontenSubMenuController::class, 'create'])->name('konten.create');
    Route::post('/konten', [KontenSubMenuController::class, 'store'])->name('konten.store');
    Route::get('/konten-{id}', [KontenSubMenuController::class, 'edit'])->name('konten.edit');
    Route::put('/konten-{id}', [KontenSubMenuController::class, 'update'])->name('konten.update');
    Route::delete('/konten-{id}', [KontenSubMenuController::class, 'destroy'])->name('konten.destroy');

    // Menu Tambah Admin
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user-{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

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

    // FAQ
    Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');
    Route::get('/faq-create', [FAQController::class, 'create'])->name('faq.create');
    Route::post('/faq', [FAQController::class, 'store'])->name('faq.store');
    Route::get('/faq-{id}', [FAQController::class, 'edit'])->name('faq.edit');
    Route::put('/faq-{id}', [FAQController::class, 'update'])->name('faq.update');
    Route::delete('/faq-{id}', [FAQController::class, 'destroy'])->name('faq.destroy');

    // Layanan
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan-create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan-{id}', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan-{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan-{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    // Kategori Berita
    Route::get('/kategori-berita', [KategoriBeritaController::class, 'index'])->name('kategori-berita.index');
    Route::get('/kategori-berita-create', [KategoriBeritaController::class, 'create'])->name('kategori-berita.create');
    Route::post('/kategori-berita', [KategoriBeritaController::class, 'store'])->name('kategori-berita.store');
    Route::get('/kategori-berita-{id}', [KategoriBeritaController::class, 'edit'])->name('kategori-berita.edit');
    Route::put('/kategori-berita-{id}', [KategoriBeritaController::class, 'update'])->name('kategori-berita.update');
    Route::delete('/kategori-berita-{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori-berita.destroy');

    // Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita-create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita-{id}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita-{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita-{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Download
    Route::get('/downloaden', [DownloadController::class, 'index'])->name('download.index');
    Route::get('/download-create', [DownloadController::class, 'create'])->name('download.create');
    Route::post('/download', [DownloadController::class, 'store'])->name('download.store');
    Route::get('/download-{id}', [DownloadController::class, 'edit'])->name('download.edit');
    Route::put('/download-{id}', [DownloadController::class, 'update'])->name('download.update');
    Route::delete('download-{id}', [DownloadController::class, 'destroy'])->name('download.destroy');

    // jamop
    Route::get('/jamad', [JamController::class, 'index'])->name('jam.index');
    Route::get('/jam-create', [JamController::class, 'create'])->name('jam.create');
    Route::post('/jamad', [JamController::class, 'store'])->name('jam.store');
    Route::get('/jam-{id}', [JamController::class, 'edit'])->name('jam.edit');
    Route::put('/jam-{id}', [JamController::class, 'update'])->name('jam.update');
    Route::delete('/jam-{id}', [JamController::class, 'destroy'])->name('jam.destroy');


    //  kontak
    Route::get('/kontakad', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak-create', [KontakController::class, 'create'])->name('kontak.create');
    Route::post('/kontakad', [KontakController::class, 'store'])->name('kontak.store');
    Route::get('/kontak-{id}', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak-{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::delete('/kontak-{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');

    //  LinkSos
    Route::get('/linksosad', [LinksosController::class, 'index'])->name('linksos.index');
    Route::get('/linksos-create', [LinksosController::class, 'create'])->name('linksos.create');
    Route::post('/linksosad', [LinksosController::class, 'store'])->name('linksos.store');
    Route::get('/linksos-{id}', [LinksosController::class, 'edit'])->name('linksos.edit');
    Route::put('/linksos-{id}', [LinksosController::class, 'update'])->name('linksos.update');
    Route::delete('/linksos-{id}', [LinksosController::class, 'destroy'])->name('linksos.destroy');

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil-create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('/profil-{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil-{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('profil-{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');

    // Tupoksi
    Route::get('/tupoksivm', [TupoksiController::class, 'index'])->name('tupoksi.index');
    Route::get('/tupoksi-create', [TupoksiController::class, 'create'])->name('tupoksi.create');
    Route::post('/tupoksivm', [TupoksiController::class, 'store'])->name('tupoksi.store');
    Route::get('/tupoksi-{id}', [TupoksiController::class, 'edit'])->name('tupoksi.edit');
    Route::put('/tupoksi-{id}', [TupoksiController::class, 'update'])->name('tupoksi.update');
    Route::delete('tupoksi-{id}', [TupoksiController::class, 'destroy'])->name('tupoksi.destroy');

    // Struktur Organisasi
    Route::get('/strukturorg', [StrukturOrgController::class, 'index'])->name('strukturorg.index');
    Route::get('/strukturorg-create', [StrukturOrgController::class, 'create'])->name('strukturorg.create');
    Route::post('/strukturorg', [StrukturOrgController::class, 'store'])->name('strukturorg.store');
    Route::get('/strukturorg-{id}', [StrukturOrgController::class, 'edit'])->name('strukturorg.edit');
    Route::put('/strukturorg-{id}', [StrukturOrgController::class, 'update'])->name('strukturorg.update');
    Route::delete('strukturorg-{id}', [StrukturOrgController::class, 'destroy'])->name('strukturorg.destroy');

    // Persyaratan
    Route::get('/persyaratans', [PersyaratanController::class, 'index'])->name('persyaratan.index');
    Route::get('/persyaratan-create', [PersyaratanController::class, 'create'])->name('persyaratan.create');
    Route::post('/persyaratans', [PersyaratanController::class, 'store'])->name('persyaratan.store');
    Route::get('/persyaratan-{id}', [PersyaratanController::class, 'edit'])->name('persyaratan.edit');
    Route::put('/persyaratan-{id}', [PersyaratanController::class, 'update'])->name('persyaratan.update');
    Route::delete('persyaratan-{id}', [PersyaratanController::class, 'destroy'])->name('persyaratan.destroy');

    // Profil
    Route::get('/profilss', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil-create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('/profilss', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('/profil-{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil-{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('profil-{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');

    // Detail Download
    Route::get('/detaildownloader', [DetailDownloadController::class, 'index'])->name('detaildownload.index');
    Route::get('/detaildownload-create', [DetailDownloadController::class, 'create'])->name('detaildownload.create');
    Route::post('/detaildownloader', [DetailDownloadController::class, 'store'])->name('detaildownload.store');
    Route::get('/detaildownload-{id}', [DetailDownloadController::class, 'edit'])->name('detaildownload.edit');
    Route::put('/detaildownload-{id}', [DetailDownloadController::class, 'update'])->name('detaildownload.update');
    Route::delete('detaildownload-{id}', [DetailDownloadController::class, 'destroy'])->name('detaildownload.destroy');

    // Detail Persyaratan
    Route::get('/detailpersyaratanss', [DetailPersyaratanController::class, 'index'])->name('detailpersyaratan.index');
    Route::get('/detailpersyaratan-create', [DetailPersyaratanController::class, 'create'])->name('detailpersyaratan.create');
    Route::post('/detailpersyaratanss', [DetailPersyaratanController::class, 'store'])->name('detailpersyaratan.store');
    Route::get('/detailpersyaratan-{id}', [DetailPersyaratanController::class, 'edit'])->name('detailpersyaratan.edit');
    Route::put('/detailpersyaratan-{id}', [DetailPersyaratanController::class, 'update'])->name('detailpersyaratan.update');
    Route::delete('detailpersyaratan-{id}', [DetailPersyaratanController::class, 'destroy'])->name('detailpersyaratan.destroy');

    // Landing Admin
    Route::view('/admin', 'dashboard-admin')->name('admin.index');
});


// Buat routing ngecek view dari frontend sebelum dibuat CRUD
// Setelah dibuat CRUD hapus routingan dibawah ini


Route::view('/tamat', 'detail-layanan.tamat')->name('tamat');
Route::view('/dokumake', 'detail-layanan.dokumake')->name('dokumake');
Route::view('/makedikesmoke', 'detail-layanan.makedikesmoke')->name('makedikesmoke');
Route::view('/makepetantuma', 'detail-layanan.makepetantuma')->name('makepetantuma');
Route::view('/melodi', 'detail-layanan.melodi')->name('melodi');







