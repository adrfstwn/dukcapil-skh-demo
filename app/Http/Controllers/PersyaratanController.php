<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use App\Models\KategoriPersyaratan;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    // Method untuk menampilkan semua persyaratan
    public function index()
    {
        $persyaratans = Persyaratan::all();
        return view('admin.persyaratan.index', compact('persyaratans'));
    }

    // Method untuk menampilkan detail persyaratan berdasarkan ID
    public function show()
    {
        $persyaratans = Persyaratan::orderBy('created_at', 'desc')->paginate(5); // Ambil 5 persyaratan per halaman
        return view('persyaratan', compact('persyaratans'));
    }

    // Method lainnya...

    public function create()
    {
        $kategoriPersyaratan = KategoriPersyaratan::all();
        return view('admin.persyaratan.create', compact('kategoriPersyaratan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_persyaratan' => 'required|string',
            'file' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Hanya file gambar yang diterima
            'kategori_id' => 'required|in:1,2',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        Persyaratan::create([
            'judul' => $request->judul,
            'deskripsi_persyaratan' => $request->deskripsi_persyaratan,
            'file' => $filePath,
            'kategori_id' => $request->kategori_id,
        ]);

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
            'kategori_id' => 'required',
            'judul' => 'required',
            'deskripsi_persyaratan' => 'required',
            'file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Hanya file gambar yang diterima
        ]);

        $persyaratan = Persyaratan::findOrFail($id);

        $persyaratan->kategori_id = $request->kategori_id;
        $persyaratan->judul = $request->judul;
        $persyaratan->deskripsi_persyaratan = $request->deskripsi_persyaratan;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename); // Simpan di direktori uploads
            $persyaratan->file = 'uploads/' . $filename; // Update path file
        }

        $persyaratan->save();

        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan updated successfully.');
    }

    public function destroy($id)
    {
        $persyaratan = Persyaratan::findOrFail($id);
        $persyaratan->delete();
        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan deleted successfully.');
    }

    // Method CRUD untuk kategori persyaratan
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
        return view('detail-persyaratan', compact('persyaratans'));
    }
}
