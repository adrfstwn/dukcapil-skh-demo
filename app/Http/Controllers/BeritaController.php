<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        $kategoriBeritas = KategoriBerita::all();
        foreach ($beritas as $berita) {
            // Jika gambar berita tidak null, atur URL gambar
            if ($berita->gambar_berita) {
                $berita->gambar_berita = asset(Storage::url($berita->gambar_berita));
            }
        }
        return view('admin.berita.index', compact('beritas','kategoriBeritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_berita' => 'required|string|max:255',
            'gambar_berita' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required|exists:kategori_berita,id'
        ]);

        // Upload gambar
        $gambarPath = $request->file('gambar_berita')->store('berita', 'public');

        $berita = Berita::create([
            'judul' => $validatedData['judul'],
            'deskripsi_berita' => $validatedData['deskripsi_berita'],
            'gambar_berita' => $gambarPath,
            'kategori_id' => $validatedData['kategori_id']
        ]);

        if ($berita) {
            return redirect()->route('berita.index')->with('success', 'Berita created successfully');
        } else {
            return back()->with('error', 'Failed to create berita');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_berita' => 'required|string|max:255',
            'gambar_berita' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required|exists:kategori_berita,id'
        ]);

        if ($request->hasFile('gambar_berita')) {
            // Upload gambar baru
            $gambarPath = $request->file('gambar_berita')->store('berita', 'public');
            // Hapus gambar lama
            Storage::delete($berita->gambar_berita);
            $berita->gambar_berita = $gambarPath;
        }

        $berita->judul = $validatedData['judul'];
        $berita->deskripsi_berita = $validatedData['deskripsi_berita'];
        $berita->kategori_id = $validatedData['kategori_id'];
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        // Hapus gambar dari storage
        Storage::delete($berita->gambar_berita);
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita deleted successfully');
    }
}
