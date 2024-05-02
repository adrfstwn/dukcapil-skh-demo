<?php

use Illuminate\Support\Facades\Route;
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

//Hometttt
Route::get('/', [HomeController::class, 'index']);

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

// Middleware
Route::group(['middleware' => ['auth', AdminMiddleware::class]], function () {

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
    Route::delete('berita-{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Landing Admin
    Route::view('/admin', 'master-admin')->name('admin.index');
});





