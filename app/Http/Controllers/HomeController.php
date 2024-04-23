<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;

class HomeController extends Controller
{
    public function index()
    {
        $homeSliders = HomeSlider::all();
        foreach ($homeSliders as $homeSlider) {
            $homeSlider->gambar_slider = asset($homeSlider->gambar_slider);
        }
        return view('home', compact('homeSliders'));
    }
}
