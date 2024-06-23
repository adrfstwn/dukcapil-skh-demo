<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Berita;
use App\Models\Persyaratan;
use App\Models\KategoriDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::orderBy('created_at', 'DESC')->get(); // Mengambil data download diurutkan berdasarkan created_at DESC
        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.download-content.index', compact('downloads','latestPersyaratan'));
    }

    public function create()
    {
        $kategoriDownloads = KategoriDownload::all();
        return view('admin.download-content.create', compact('kategoriDownloads'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'kategori_id' => 'required',
        'judul' => 'required',
        'deskripsi_download' => 'nullable', // Deskripsi bisa nullable
        'file' => 'nullable|file',
        'status' => ['required', Rule::in(['DRAFT', 'PUBLISH'])],
    ]);

    // Proses menyimpan data
    $download = new Download();
    $download->kategori_id = $validatedData['kategori_id'];
    $download->judul = $validatedData['judul'];
    $download->deskripsi_download = $validatedData['deskripsi_download'];
    $download->file = $validatedData['file'];
    $download->status = $validatedData['status'];

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('file_download', $fileName, 'public');
        $download->file = $filePath;
    }

    $download->save();

    return redirect()->route('download.index');
}


    public function edit($id)
    {
        $download = Download::findOrFail($id);
        $kategoriDownloads = KategoriDownload::all();
        return view('admin.download-content.edit', compact('download', 'kategoriDownloads'));
    }

    public function show()
    {
        $downloads = Download::orderBy('created_at', 'DESC')->get();
        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();
        return view('download', compact('downloads','latestPersyaratan'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi_download' => 'nullable|string',
        'kategori_id' => 'required|exists:kategori_download,id',
        'status' => ['required', Rule::in(['DRAFT', 'PUBLISH'])], // Validasi status
        'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif|max:2048',
    ]);

    $download = Download::findOrFail($id);

    $download->judul = $request->judul;
    $download->deskripsi_download = $request->deskripsi_download;
    $download->kategori_id = $request->kategori_id;
    $download->status = $request->status; // Simpan status

    if ($request->hasFile('file')) {
        // Hapus file lama jika ada
        if ($download->file && Storage::disk('public')->exists($download->file)) {
            Storage::disk('public')->delete($download->file);
        }

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('file_download', $fileName, 'public');
        $download->file = $filePath;
    }

    $download->save();

    return redirect()->route('download.index')->with('success', 'Download updated successfully.');
}

    public function destroy($id)
    {
        $download = Download::findOrFail($id);

        // Hapus file jika ada
        if ($download->file && Storage::disk('public')->exists($download->file)) {
            Storage::disk('public')->delete($download->file);
        }

        $download->delete();
        return redirect()->route('download.index')->with('success', 'Download deleted successfully.');
    }

    public function showDetail($id)
    {
        $downloads = Download::findOrFail($id);
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();
        return view('detail-download', compact('downloads','latestPersyaratan','beritaTerbaru'));
    }
}
