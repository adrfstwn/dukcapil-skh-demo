<?php

namespace App\Http\Controllers;

use App\Models\Download;
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
        return view('admin.download-content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi_download' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // contoh validasi untuk file dengan ekstensi pdf, doc, docx, dan maksimum ukuran 2MB
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        Download::create([
            'judul' => $request->judul,
            'deskripsi_download' => $request->deskripsi_download,
            'file' => $filePath,
        ]);

        return redirect()->route('download.index')->with('success', 'Download created successfully.');
    }

    public function show()
    {
        $downloads = Download::all();
        return view('download', compact('downloads'));
    }

    public function edit($id)
    {
        $download= Download::findOrFail($id);
        return view('admin.download-content.edit', compact('download'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi_download' => 'required',
        ]);

        $download = Download::findOrFail($id);

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,doc,docx|max:2048',
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $download->file = $filePath;
        }

        $download->judul = $request->judul;
        $download->deskripsi_download = $request->deskripsi_download;
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
