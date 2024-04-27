<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        foreach ($layanans as $layanan) {
            $layanan->gambar = asset(Storage::url($layanan->gambar));
        }
        return view('admin.layanan.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_layanan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_layanan' => 'required',
            'link_layanan' => 'required',
        ]);

        // Upload logo mitra
        $path = $request->file('gambar')->store('layanan', 'public');;

        // Simpan data mitra ke database
        $layanan = new Layanan;
        $layanan->nama_layanan = $validatedData['nama_layanan'];
        $layanan->gambar = $path;
        $layanan->save();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->gambar = asset(Storage::url($layanan->gambar));
        return view('admin.layanan.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_layanan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deksirpsi_layanan' => 'required',
            'link_layanan' => 'required',
        ]);

        $layanan = Layanan::findOrFail($id);

        // Update nama mitra
        $layanan->nama_layanan = $validatedData['nama_layanan'];

        // Update logo mitra jika ada
        if ($request->hasFile('gambar')) {
            // Hapus logo lama
            Storage::delete($layanan->gambar);
            // Upload logo baru
            $path = $request->file('gambar')->store('layanan', 'public');;
            $layanan->gambar = $path;
        }

        $layanan->save();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        // Hapus logo layanan
        Storage::delete($layanan->gambar);
        // Hapus data layanan dari database
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus');
    }
}
