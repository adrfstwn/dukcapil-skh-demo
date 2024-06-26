<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Models\Mitra;
use App\Models\Berita;
use App\Models\FAQ;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;


class HomeController extends Controller
{
    public function index()
    {
        $homeSliders = HomeSlider::all();
        foreach ($homeSliders as $homeSlider) {
            $homeSlider->gambar_slider = asset(Storage::url($homeSlider->gambar_slider));
        }

        $mitras = Mitra::all();
        foreach ($mitras as $mitra) {
            $mitra->logo_mitra = asset(Storage::url($mitra->logo_mitra));
        }
        // $beritas = Berita::all();
        $publishedBeritas = Berita::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->get();

    $beritas = $publishedBeritas->take(4); // Ambil 3 berita terbaru
    Carbon::setLocale('id');
    foreach ($beritas as $berita) {
        $berita->waktu = Carbon::parse($berita->waktu)->translatedFormat('l, j F Y');
        $berita->gambar_berita = asset(Storage::url($berita->gambar_berita));
    }

    //faq
        $faqs = FAQ::all(); // Mengambil semua FAQ dari database
        foreach ($faqs as $faq) {
            // Mengganti variabel $faq->logo_mitra dengan pertanyaan dan jawaban FAQ
            $faq->pertanyaans = $faq->pertanyaan; // Sesuaikan dengan nama kolom di database
            $faq->jawabans = $faq->jawaban; // Sesuaikan dengan nama kolom di database
        }

        $layanans = Layanan::all();
        $currentSlide = 0;
        foreach ($layanans as $layanan) {
            $layanan->gambar = asset(Storage::url($layanan->gambar));
        }

        return view('home', compact('beritas','homeSliders', 'mitras', 'faqs', 'layanans','currentSlide'));
    }

}
