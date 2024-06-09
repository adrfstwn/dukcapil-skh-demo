<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPersyaratan;
use Illuminate\Support\Facades\Storage;

class DetailPersyaratanController extends Controller
{
    public function index()
    {
        $detailpersyaratans = DetailPersyaratan::all();
        return view('admin.detailpersyaratan.index', compact('detailpersyaratans'));
    }

    public function create()
    {
        return view('admin.detailpersyaratan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi_detail_persyaratan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $pathGambar = $request->file('gambar')->storeAs('public/detailpersyaratan', $namaGambar);

        DetailPersyaratan::create([
            'nama' => $request->nama,
            'deskripsi_detail_persyaratan' => $request->deskripsi_detail_persyaratan,
            'gambar' => 'detailpersyaratan/' . $namaGambar,
        ]);

        return redirect()->route('detailpersyaratan.index')->with('success', 'Detail Persyaratan berhasil dibuat.');
    }

    public function show()
    {
        $detailpersyaratans = DetailPersyaratan::all();
        return view('detailpersyaratan', compact('detailpersyaratans'));
    }

    public function edit($id)
    {
        $detailpersyaratan = DetailPersyaratan::findOrFail($id);
        return view('admin.detailpersyaratan.edit', compact('detailpersyaratan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi_detail_persyaratan' => 'required',
        ]);

        $detailpersyaratan = DetailPersyaratan::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $pathGambar = $request->file('gambar')->storeAs('public/detailpersyaratan', $namaGambar);
            $detailpersyaratan->gambar = 'detailpersyaratan/' . $namaGambar;
        }

        $detailpersyaratan->nama = $request->nama;
        $detailpersyaratan->deskripsi_detail_persyaratan = $request->deskripsi_detail_persyaratan;
        $detailpersyaratan->save();

        return redirect()->route('detailpersyaratan.index')->with('success', 'Detail Persyaratan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $detailpersyaratan = DetailPersyaratan::findOrFail($id);
        Storage::delete('public/' . $detailpersyaratan->gambar);
        $detailpersyaratan->delete();
        return redirect()->route('detailpersyaratan.index')->with('success', 'Detail Persyaratan berhasil dihapus.');
    }
}
