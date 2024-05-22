<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profils = Profil::all();
        return view('admin.profil.index', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi_profil' => 'required',
            'gambar_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar_profil')) {
            $path = $request->file('gambar_profil')->store('profil_images', 'public');
            $validatedData['gambar_profil'] = $path;
        }

        Profil::create($validatedData);

        return redirect()->route('profil.index')->with('success', 'Profil created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        return view('profil.show', compact('profils'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', compact('profils'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profil)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi_profil' => 'required',
            'gambar_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar_profil')) {
            if ($profil->gambar_profil && Storage::disk('public')->exists($profil->gambar_profil)) {
                Storage::disk('public')->delete($profil->gambar_profil);
            }
            $path = $request->file('gambar_profil')->store('profil_images', 'public');
            $validatedData['gambar_profil'] = $path;
        }

        $profil->update($validatedData);

        return redirect()->route('profil.index')->with('success', 'Profil updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        if ($profil->gambar_profil && Storage::disk('public')->exists($profil->gambar_profil)) {
            Storage::disk('public')->delete($profil->gambar_profil);
        }

        $profil->delete();

        return redirect()->route('profil.index')->with('success', 'Profil deleted successfully.');
    }
}
