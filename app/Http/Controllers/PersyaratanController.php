<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    public function index()
    {
        $persyaratans = Persyaratan::all();
        return view('admin.persyaratan.index', compact('persyaratans'));
    }

    public function create()
    {
        return view('admin.persyaratan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi_persyaratan' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // contoh validasi untuk file dengan ekstensi pdf, doc, docx, dan maksimum ukuran 2MB
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        Persyaratan::create([
            'judul' => $request->judul,
            'deskripsi_persyaratan' => $request->deskripsi_persyaratan,
            'file' => $filePath,
        ]);

        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan created successfully.');
    }

    public function show()
    {
        $persyaratans = Persyaratan::all();
        return view('persyaratan', compact('persyaratans'));
    }

    public function edit($id)
    {
        $persyaratan= Persyaratan::findOrFail($id);
        return view('admin.persyaratan.edit', compact('persyaratan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi_persyaratan' => 'required',
        ]);

        $persyaratan = Persyaratan::findOrFail($id);

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,doc,docx|max:2048',
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $persyaratan->file = $filePath;
        }

        $persyaratan->judul = $request->judul;
        $persyaratan->deskripsi_persyaratan = $request->deskripsi_persyaratan;
        $persyaratan->save();

        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan updated successfully.');
    }

    public function destroy($id)
    {
        $persyaratan = Persyaratan::findOrFail($id);
        $persyaratan->delete();
        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan deleted successfully.');
    }
}
