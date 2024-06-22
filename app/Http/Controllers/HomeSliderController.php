<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Storage;


class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homeSliders = HomeSlider::all();
        foreach ($homeSliders as $homeSlider) {
            $homeSlider->gambar_slider = asset(Storage::url($homeSlider->gambar_slider));
        }
        return view('admin.home-slider.index', compact('homeSliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
            'gambar_slider' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar
        $gambarPath = $request->file('gambar_slider')->store('home-slider', 'public');

        $homeSlider = HomeSlider::create([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'gambar_slider' => $gambarPath,
        ]);

        if ($homeSlider) {
            return redirect()->route('homeslider.index')->with('success', 'Home slider created successfully');
        } else {
            return back()->with('error', 'Failed to create home slider');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $homeSlider = HomeSlider::findOrFail($id);
        return view('admin.home-slider.index', compact('homeSlider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $homeSlider = HomeSlider::findOrFail($id);
        return view('admin.home-slider.edit', compact('homeSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $homeSlider = HomeSlider::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
            'gambar_slider' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_slider')) {
            // Upload gambar baru
            $gambarPath = $request->file('gambar_slider')->store('home-slider', 'public');
            // Hapus gambar lama
            Storage::delete($homeSlider->gambar_slider);
            $homeSlider->gambar_slider = $gambarPath;
        }

        $homeSlider->judul = $validatedData['judul'];
        $homeSlider->deskripsi = $validatedData['deskripsi'];
        $homeSlider->save();

        return redirect()->route('homeslider.index')->with('success', 'Home slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $homeSlider = HomeSlider::findOrFail($id);
        // Hapus gambar dari storage
        Storage::delete($homeSlider->gambar_slider);
        $homeSlider->delete();

        return redirect()->route('homeslider.index')->with('success', 'Home slider deleted successfully');
    }
}
