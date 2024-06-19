<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\KategoriDownload;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return view('admin.download-content.index', compact('downloads'));
    }

    public function create()
    {
        $kategoriDownloads = KategoriDownload::all();
        return view('admin.download-content.create', compact('kategoriDownloads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_download' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:2048',
            'kategori_id' => 'required|exists:kategori_download,id',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        Download::create([
            'judul' => $request->judul,
            'deskripsi_download' => $request->deskripsi_download,
            'file' => $filePath,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('download.index')->with('success', 'Download created successfully.');
    }

    public function edit($id)
    {
        $download = Download::findOrFail($id);
        $kategoriDownloads = KategoriDownload::all();
        return view('admin.download-content.edit', compact('download', 'kategoriDownloads'));
    }

    public function show()
    {
        $downloads = Download::all();
        return view('download', compact('downloads'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_download' => 'required|string',
            'kategori_id' => 'required|exists:kategori_download,id',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $download = Download::findOrFail($id);

        $download->judul = $request->judul;
        $download->deskripsi_download = $request->deskripsi_download;
        $download->kategori_id = $request->kategori_id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $download->file = $filePath;
        }

        $download->save();

        return redirect()->route('download.index')->with('success', 'Download updated successfully.');
    }

    public function destroy($id)
    {
        $download = Download::findOrFail($id);
        $download->delete();
        return redirect()->route('download.index')->with('success', 'Download deleted successfully.');
    }
}
