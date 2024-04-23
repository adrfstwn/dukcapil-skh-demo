<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitras = Mitra::all();
        foreach ($mitras as $mitra) {
            $mitra->logo_mitra = asset(Storage::url($mitra->logo_mitra));
        }
        return view('admin.mitra.index', compact('mitras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required',
            'logo_mitra' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload logo mitra
        $path = $request->file('logo_mitra')->store('mitra', 'public');;

        // Simpan data mitra ke database
        $mitra = new Mitra;
        $mitra->nama = $validatedData['nama'];
        $mitra->logo_mitra = $path;
        $mitra->save();

        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->logo_mitra = asset(Storage::url($mitra->logo_mitra));
        return view('admin.mitra.show', compact('mitra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required',
            'logo_mitra' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mitra = Mitra::findOrFail($id);

        // Update nama mitra
        $mitra->nama = $validatedData['nama'];

        // Update logo mitra jika ada
        if ($request->hasFile('logo_mitra')) {
            // Hapus logo lama
            Storage::delete($mitra->logo_mitra);
            // Upload logo baru
            $path = $request->file('logo_mitra')->store('mitra', 'public');;
            $mitra->logo_mitra = $path;
        }

        $mitra->save();

        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        // Hapus logo mitra
        Storage::delete($mitra->logo_mitra);
        // Hapus data mitra dari database
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil dihapus');
    }
}
