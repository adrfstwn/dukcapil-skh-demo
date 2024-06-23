<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use App\Models\Berita;
use App\Models\KategoriPersyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PersyaratanController extends Controller
{
    // Method untuk menampilkan semua persyaratan
    public function index()
    {
        $persyaratans = Persyaratan::orderBy('created_at', 'DESC')->get(); // Mengambil data download diurutkan berdasarkan created_at DESC
        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.persyaratan.index', compact('persyaratans','latestPersyaratan'));
    }

    // Method untuk menampilkan detail persyaratan berdasarkan ID
    public function show()
    {
        $persyaratans = Persyaratan::orderBy('created_at', 'DESC')->get(); // Mengambil data download diurutkan berdasarkan created_at DESC
        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();
        return view('persyaratan', compact('persyaratans','latestPersyaratan'));
    }

    public function create()
    {
        $kategoriPersyaratan = KategoriPersyaratan::all();
        return view('admin.persyaratan.create', compact('kategoriPersyaratan'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'kategori_id' => 'required',
        'judul' => 'required',
        'deskripsi_persyaratan' => 'nullable', // Deskripsi bisa nullable
        'file' => 'nullable|file',
        'status' => ['required', Rule::in(['DRAFT', 'PUBLISH'])],
    ]);

    // Proses menyimpan data
    $persyaratan = new Persyaratan();
    $persyaratan->kategori_id = $validatedData['kategori_id'];
    $persyaratan->judul = $validatedData['judul'];
    $persyaratan->deskripsi_persyaratan = $validatedData['deskripsi_persyaratan'];
    $persyaratan->status = $validatedData['status'];

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('file_persyaratan', $fileName, 'public');
        $persyaratan->file = $filePath;
    }

    $persyaratan->save();

    return redirect()->route('persyaratan.index')->with('success', 'Persyaratan created successfully.');
}

    public function edit($id)
    {
        $persyaratan = Persyaratan::findOrFail($id);
        $kategoriPersyaratan = KategoriPersyaratan::all();
        return view('admin.persyaratan.edit', compact('persyaratan', 'kategoriPersyaratan'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi_persyaratan' => 'nullable|string',
        'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048', // Terima file gambar dan dokumen
        'kategori_id' => 'required|exists:kategori_persyaratan,id',
        'status' => ['required', Rule::in(['DRAFT', 'PUBLISH'])], // Validasi status
    ]);

    $persyaratan = Persyaratan::findOrFail($id);

    $persyaratan->judul = $request->judul;
    $persyaratan->deskripsi_persyaratan = $request->deskripsi_persyaratan;
    $persyaratan->kategori_id = $request->kategori_id;
    $persyaratan->status = $request->status; // Simpan status

    if ($request->hasFile('file')) {
        // Hapus file lama jika ada
        if ($persyaratan->file && Storage::disk('public')->exists($persyaratan->file)) {
            Storage::disk('public')->delete($persyaratan->file);
        }

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('file_persyaratan', $fileName, 'public');
        $persyaratan->file = $filePath;
    }

    $persyaratan->save();

    return redirect()->route('persyaratan.index')->with('success', 'Persyaratan updated successfully.');
}

    public function destroy($id)
    {
        $persyaratan = Persyaratan::findOrFail($id);

        // Hapus file jika ada
        if ($persyaratan->file && Storage::disk('public')->exists($persyaratan->file)) {
            Storage::disk('public')->delete($persyaratan->file);
        }

        $persyaratan->delete();
        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan deleted successfully.');
    }

    public function indexKategori()
    {
        $kategoriPersyaratan = KategoriPersyaratan::all();
        return view('admin.kategori-persyaratan.index', compact('kategoriPersyaratan'));
    }

    public function createKategori()
    {
        return view('admin.kategori-persyaratan.create');
    }

    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_persyaratan'
        ]);

        KategoriPersyaratan::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori-persyaratan.index')->with('success', 'Kategori Persyaratan created successfully.');
    }

    public function editKategori($id)
    {
        $kategoriPersyaratan = KategoriPersyaratan::findOrFail($id);
        return view('admin.kategori-persyaratan.edit', compact('kategoriPersyaratan'));
    }

    public function updateKategori(Request $request, $id)
    {
        $kategoriPersyaratan = KategoriPersyaratan::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_persyaratan,nama_kategori,' . $id
        ]);

        $kategoriPersyaratan->nama_kategori = $request->nama_kategori;
        $kategoriPersyaratan->save();

        return redirect()->route('kategori-persyaratan.index')->with('success', 'Kategori Persyaratan updated successfully.');
    }

    public function destroyKategori($id)
    {
        $kategoriPersyaratan = KategoriPersyaratan::findOrFail($id);
        $kategoriPersyaratan->delete();
        return redirect()->route('kategori-persyaratan.index')->with('success', 'Kategori Persyaratan deleted successfully.');
    }

    public function showDetail($id)
    {
        $persyaratans = Persyaratan::findOrFail($id);
        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(3)->get();
        return view('detail-persyaratan', compact('persyaratans','latestPersyaratan','beritaTerbaru'));
    }
}
