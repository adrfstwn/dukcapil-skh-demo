<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPersyaratan;

class KategoriPersyaratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriPersyaratans = KategoriPersyaratan::whereIn('nama_kategori', ['layanan pendaftaran penduduk', 'layanan pendaftaran sipil'])->get();
        return view('admin.persyaratan.index', compact('kategoriPersyaratans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.persyaratan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_persyaratan|in:layanan pendaftaran penduduk,layanan pendaftaran sipil'
        ]);

        $kategoriPersyaratan = KategoriPersyaratan::create($validatedData);

        if ($kategoriPersyaratan) {
            return redirect()->route('persyaratan.index')->with('success', 'Kategori persyaratan created successfully');
        } else {
            return back()->with('error', 'Failed to create kategori persyaratan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategoriPersyaratan = KategoriPersyaratan::whereIn('nama_kategori', ['layanan pendaftaran penduduk', 'layanan pendaftaran sipil'])->findOrFail($id);
        return view('admin.persyaratan.show', compact('kategoriPersyaratan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoriPersyaratan = KategoriPersyaratan::whereIn('nama_kategori', ['layanan pendaftaran penduduk', 'layanan pendaftaran sipil'])->findOrFail($id);
        return view('admin.persyaratan.edit', compact('kategoriPersyaratan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategoriPersyaratan = KategoriPersyaratan::whereIn('nama_kategori', ['layanan pendaftaran penduduk', 'layanan pendaftaran sipil'])->findOrFail($id);

        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_persyaratan,nama_kategori,' . $id . '|in:layanan pendaftaran penduduk,layanan pendaftaran sipil'
        ]);

        $kategoriPersyaratan->update($validatedData);

        return redirect()->route('persyaratan.index')->with('success', 'Kategori persyaratan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategoriPersyaratan = KategoriPersyaratan::whereIn('nama_kategori', ['layanan pendaftaran penduduk', 'layanan pendaftaran sipil'])->findOrFail($id);
        $kategoriPersyaratan->delete();

        return redirect()->route('persyaratan.index')->with('success', 'Kategori persyaratan deleted successfully');
    }
}
