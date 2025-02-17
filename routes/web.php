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
use App\Http\Middleware\EnsureEmailIsVerified;
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
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\KontenSubMenuController;
use App\Http\Controllers\KontenMenuController;
use App\Http\Controllers\DasboardAdminController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\Auth\VerifyEmailController;

//Home
Route::get('/', [HomeController::class, 'index']);

// Konten Submenu
Route::get('/menu-{menu_id}-konten', [KontenMenuController::class, 'showByMenu'])->name('konten.showByMenu');

// Konten Submenu
Route::get('/submenu-{submenu_id}-konten', [KontenSubMenuController::class, 'showBySubmenu'])->name('konten.showBySubmenu');


// Menu Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/auth', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Verify Email
Route::group(['middleware' => 'auth'], function () {
    Route::get('/email-verify', [VerifyEmailController::class, 'show'])->name('verification.notice');
    Route::get('/email-verify-{id}-{hash}', [VerifyEmailController::class, 'verify'])->name('verification.verify');
    Route::post('/email-resend', [VerifyEmailController::class, 'sendVerificationEmail'])->name('verification.send');
});
// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// FAQ
Route::get('/faq-show', [FAQController::class, 'show'])->name('faq.show');

// Download
Route::get('/download', [DownloadController::class, 'show'])->name('download.show');
Route::get('/download-{id}', [DownloadController::class, 'showDetail'])->name('download.detail');

//Profil
Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');

//kontak
Route::get('/kontak', [KontakController::class, 'show'])->name('kontak.show');
Route::get('/kontak', [JamController::class, 'show'])->name('jam.show');
Route::get('/kontak', [LinksosController::class, 'show'])->name('linksos.show');
// Route::get('/kontak', [MapController::class, 'show'])->name('map.show');

// Tupoksi
Route::get('/tupoksi', [TupoksiController::class, 'show'])->name('tupoksi.show');

// Struktur Organisasi
Route::get('/struktur-organisasi', [StrukturOrgController::class, 'show'])->name('strukturorg.show');

// Persyaratan
Route::get('/persyaratan', [PersyaratanController::class, 'show'])->name('persyaratan.show');
Route::get('/persyaratan-{id}', [PersyaratanController::class, 'showDetail'])->name('persyaratan.detail');

// Profil
Route::get('/profile', [ProfilController::class, 'show'])->name('profil.show');

// Berita
Route::get('/beritane', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/beritane-{id}', [BeritaController::class, 'showDetail'])->name('berita.detail');

// Middleware
Route::group(['middleware' => ['auth', 'admin','verified']], function () {

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

    //Konten Menu
    Route::get('/konten-menu', [KontenMenuController::class, 'index'])->name('konten-menu.index');
    Route::get('/konten-menu-create', [KontenMenuController::class, 'create'])->name('konten-menu.create');
    Route::post('/konten-menu', [KontenMenuController::class, 'store'])->name('konten-menu.store');
    Route::get('/konten-menu-{id}', [KontenMenuController::class, 'edit'])->name('konten-menu.edit');
    Route::put('/konten-menu-{id}', [KontenMenuController::class, 'update'])->name('konten-menu.update');
    Route::delete('/konten-menu-{id}', [KontenMenuController::class, 'destroy'])->name('konten-menu.destroy');

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

    // Mitra
    Route::get('/mapad', [MapController::class, 'index'])->name('map.index');
    Route::get('/map-create', [MapController::class, 'create'])->name('map.create');
    Route::post('/map', [MapController::class, 'store'])->name('map.store');
    Route::get('/map-{id}', [MapController::class, 'edit'])->name('map.edit');
    Route::put('/map-{id}', [MapController::class, 'update'])->name('map.update');
    Route::delete('/map-{id}', [MapController::class, 'destroy'])->name('map.destroy');


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
    Route::get('/downloaden-create', [DownloadController::class, 'create'])->name('download.create');
    Route::post('/downloaden', [DownloadController::class, 'store'])->name('download.store');
    Route::get('/downloaden-{id}', [DownloadController::class, 'edit'])->name('download.edit');
    Route::put('/downloaden-{id}', [DownloadController::class, 'update'])->name('download.update');
    Route::delete('downloaden-{id}', [DownloadController::class, 'destroy'])->name('download.destroy');

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
    Route::get('/persyaratans-create', [PersyaratanController::class, 'create'])->name('persyaratan.create');
    Route::post('/persyaratans', [PersyaratanController::class, 'store'])->name('persyaratan.store');
    Route::get('/persyaratans-{id}', [PersyaratanController::class, 'edit'])->name('persyaratan.edit');
    Route::put('/persyaratans-{id}', [PersyaratanController::class, 'update'])->name('persyaratan.update');
    Route::delete('persyaratans-{id}', [PersyaratanController::class, 'destroy'])->name('persyaratan.destroy');



    // Profil
    Route::get('/profilss', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil-create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('/profilss', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('/profil-{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil-{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('profil-{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');

    // Landing Admin
    Route::get('/admin', [DasboardAdminController::class, 'index'])->name('admin.index');
});


// Buat routing ngecek view dari frontend sebelum dibuat CRUD
// Setelah dibuat CRUD hapus routingan dibawah ini


Route::view('/tamat', 'detail-layanan.tamat')->name('tamat');
Route::view('/dokumake', 'detail-layanan.dokumake')->name('dokumake');
Route::view('/makedikesmoke', 'detail-layanan.makedikesmoke')->name('makedikesmoke');
Route::view('/makepetantuma', 'detail-layanan.makepetantuma')->name('makepetantuma');
Route::view('/melodi', 'detail-layanan.melodi')->name('melodi');







