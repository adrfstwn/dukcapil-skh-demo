<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Models\Mitra;
use App\Models\FAQ;
use Illuminate\Support\Facades\Storage;


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

        $faqs = FAQ::all(); // Mengambil semua FAQ dari database
        foreach ($faqs as $faq) {
            // Mengganti variabel $faq->logo_mitra dengan pertanyaan dan jawaban FAQ
            $faq->pertanyaan = $faq->pertanyaan; // Sesuaikan dengan nama kolom di database
            $faq->jawaban = $faq->jawaban; // Sesuaikan dengan nama kolom di database
        }

        return view('home', compact('homeSliders', 'mitras', 'faqs'));
    }

}
