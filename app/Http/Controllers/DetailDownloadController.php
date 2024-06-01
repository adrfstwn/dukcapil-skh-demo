<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailDownload;
use Illuminate\Support\Facades\Storage;

class DetailDownloadController extends Controller
{
    public function index()
    {
        $detaildownloads = DetailDownload::all();
        return view('admin.detaildownload.index', compact('detaildownloads'));
    }

    public function create()
    {
        return view('admin.detaildownload.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi_detail_download' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $pathGambar = $request->file('gambar')->storeAs('public/detaildownload', $namaGambar);

        DetailDownload::create([
            'nama' => $request->nama,
            'deskripsi_detail_download' => $request->deskripsi_detail_download,
            'gambar' => 'detaildownload/' . $namaGambar,
        ]);

        return redirect()->route('detaildownload.index')->with('success', 'Detail download berhasil dibuat.');
    }

    public function show()
    {
        $detaildownloads = DetailDownload::all();
        return view('detaildownload', compact('detaildownloads'));
    }

    public function edit($id)
    {
        $detaildownload = DetailDownload::findOrFail($id);
        return view('admin.detaildownload.edit', compact('detaildownload'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi_detail_download' => 'required',
        ]);

        $detaildownload = DetailDownload::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $pathGambar = $request->file('gambar')->storeAs('public/detaildownload', $namaGambar);
            $detaildownload->gambar = 'detaildownload/' . $namaGambar;
        }

        $detaildownload->nama = $request->nama;
        $detaildownload->deskripsi_detail_download = $request->deskripsi_detail_download;
        $detaildownload->save();

        return redirect()->route('detaildownload.index')->with('success', 'Detail download berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $detaildownload = DetailDownload::findOrFail($id);
        Storage::delete('public/' . $detaildownload->gambar);
        $detaildownload->delete();
        return redirect()->route('detaildownload.index')->with('success', 'Detail download berhasil dihapus.');
    }
}
