<?php

namespace App\Http\Controllers;

use App\Models\KategoriDownload;
use Illuminate\Http\Request;

class KategoriDownloadController extends Controller
{
    public function index()
    {
        $kategoriDownloads = KategoriDownload::all();
        return view('admin.kategori-download.index', compact('kategoriDownloads'));
    }

    public function create()
    {
        return view('admin.kategori-download.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_downloads'
        ]);

        KategoriDownload::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori-download.index')->with('success', 'Kategori Download created successfully.');
    }

    public function edit($id)
    {
        $kategoriDownload = KategoriDownload::findOrFail($id);
        return view('admin.kategori-download.edit', compact('kategoriDownload'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_downloads,nama_kategori,' . $id
        ]);

        $kategoriDownload = KategoriDownload::findOrFail($id);
        $kategoriDownload->nama_kategori = $request->nama_kategori;
        $kategoriDownload->save();

        return redirect()->route('kategori-download.index')->with('success', 'Kategori Download updated successfully.');
    }

    public function destroy($id)
    {
        $kategoriDownload = KategoriDownload::findOrFail($id);
        $kategoriDownload->delete();
        return redirect()->route('kategori-download.index')->with('success', 'Kategori Download deleted successfully.');
    }
}
