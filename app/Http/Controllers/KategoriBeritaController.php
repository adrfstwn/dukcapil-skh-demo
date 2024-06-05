<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriBeritas = KategoriBerita::all();
        return view('admin.berita.index', compact('kategoriBerita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_berita'
        ]);

        $kategoriBerita = KategoriBerita::create($validatedData);

        if ($kategoriBerita) {
            return redirect()->route('berita.index')->with('success', 'Kategori berita created successfully');
        } else {
            return back()->with('error', 'Failed to create kategori berita');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
        return view('admin.kategori-berita.show', compact('kategoriBerita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
        return view('admin.kategori-berita.edit', compact('kategoriBerita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_berita,nama_kategori,' . $id
        ]);

        $kategoriBerita->update($validatedData);

        return redirect()->route('berita.index')->with('success', 'Kategori berita updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
        $kategoriBerita->delete();

        return redirect()->route('berita.index')->with('success', 'Kategori berita deleted successfully');
    }
}
