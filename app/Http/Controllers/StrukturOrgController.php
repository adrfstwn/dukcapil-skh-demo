<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrg;
use Illuminate\Http\Request;

class StrukturOrgController extends Controller
{
    public function index()
    {
        $strukturorgs = StrukturOrg::all();
        return view('admin.strukturorg.index', compact('strukturorgs'));
    }

    public function create()
    {
        return view('admin.strukturorg.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // contoh validasi untuk file dengan ekstensi pdf, doc, docx, dan maksimum ukuran 2MB
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        StrukturOrg::create([
            'judul' => $request->judul,
            'file' => $filePath,
        ]);

        return redirect()->route('strukturorg.index')->with('success', 'Strukturorg created successfully.');
    }

    public function show()
    {
        $strukturorgs = StrukturOrg::all();
        return view('strukturorg', compact('strukturorgs'));
    }

    public function edit($id)
    {
        $strukturorg= StrukturOrg::findOrFail($id);
        return view('admin.strukturorg.edit', compact('strukturorg'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
        ]);

        $strukturorg = StrukturOrg::findOrFail($id);

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,doc,docx|max:2048',
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $strukturorg->file = $filePath;
        }

        $strukturorg->judul = $request->judul;
        $strukturorg->save();

        return redirect()->route('strukturorg.index')->with('success', 'Strukturorg updated successfully.');
    }

    public function destroy($id)
    {
        $strukturorg = StrukturOrg::findOrFail($id);
        $strukturorg->delete();
        return redirect()->route('strukturorg.index')->with('success', 'Strukturorg deleted successfully.');
    }
}
