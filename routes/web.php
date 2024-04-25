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

// Menu Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/auth', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Reset Password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

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

    Route::view('/admin', 'master-admin')->name('admin.index');
});


//Home
Route::get('/', [HomeController::class, 'index']);

//Admin
Route::view('/profile', 'profil-section.profile')->name('t');
