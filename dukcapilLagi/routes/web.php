<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
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
