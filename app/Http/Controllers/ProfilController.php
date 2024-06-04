<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        return view('admin.profil.index', compact('profils'));
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi_profil' => 'required',
            'gambar_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->file('gambar_profil');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $pathGambar = $request->file('gambar_profil')->storeAs('public/profil', $namaGambar);

        Profil::create([
            'nama' => $request->nama,
            'deskripsi_profil' => $request->deskripsi_profil,
            'gambar_profil' => 'profil/' . $namaGambar,
        ]);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil dibuat.');
    }

    public function show()
    {
        $profils = Profil::all();
        return view('profil', compact('profils'));
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi_profil' => 'required',
        ]);

        $profil = Profil::findOrFail($id);

        if ($request->hasFile('gambar_profil')) {
            $request->validate([
                'gambar_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $gambar = $request->file('gambar_profil');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $pathGambar = $request->file('gambar_profil')->storeAs('public/profil', $namaGambar);
            $profil->gambar_profil = 'profil/' . $namaGambar;
        }

        $profil->nama = $request->nama;
        $profil->deskripsi_profil = $request->deskripsi_profil;
        $profil->save();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        Storage::delete('public/' . $profil->gambar_profil);
        $profil->delete();
        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus.');
    }
}
