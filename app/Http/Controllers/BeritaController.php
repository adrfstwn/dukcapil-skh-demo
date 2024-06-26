<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Persyaratan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        $kategoriBeritas = KategoriBerita::all();
        Carbon::setLocale('id');
        foreach ($beritas as $berita) {
            // Jika gambar berita tidak null, atur URL gambar
            if ($berita->gambar_berita) {
                $berita->gambar_berita = asset(Storage::url($berita->gambar_berita));
            }
            $berita->waktu = Carbon::parse($berita->waktu)->translatedFormat('l, j F Y');
        }
        return view('admin.berita.index', compact('beritas', 'kategoriBeritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriBerita = KategoriBerita::all();
        return view('admin.berita.create', compact('kategoriBerita'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_berita' => 'required|string',
            'gambar_berita' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'waktu' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_berita,id'
        ]);

        // Upload gambar
        $gambarPath = $request->file('gambar_berita')->store('berita', 'public');

        $berita = Berita::create([
            'judul' => $validatedData['judul'],
            'deskripsi_berita' => $validatedData['deskripsi_berita'],
            'gambar_berita' => $gambarPath,
            'waktu' => $validatedData['waktu'],
            'status' => $validatedData['status'],
            'kategori_id' => $validatedData['kategori_id']
        ]);

        if ($berita) {
            return redirect()->route('berita.index')->with('success', 'Berita created successfully');
        } else {
            return back()->with('error', 'Failed to create berita');
        }
    }

    public function show()
{
    $publishedBeritas = Berita::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->get();
    $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();

    $latestBeritas = $publishedBeritas->take(3); // Ambil 3 berita terbaru

    $page = request()->query('page', 1); // Ambil nomor halaman dari query, defaultnya adalah 1

    $beritas = new LengthAwarePaginator(
        $publishedBeritas->slice(($page - 1) * 5 , 5), // Ambil 5 berita setelah 3 berita terbaru, sesuai dengan nomor halaman
        $publishedBeritas->count(), // Jumlah total berita
        5, // Jumlah item per halaman
        $page, // Nomor halaman saat ini
        ['path' => LengthAwarePaginator::resolveCurrentPath()] // Path untuk halaman paginate
    );

    return view('berita', compact('latestBeritas', 'beritas','latestPersyaratan'));
}
        public function edit($id)
    {
        $kategoriBerita = KategoriBerita::all();
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita', 'kategoriBerita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_berita' => 'required|string',
            'gambar_berita' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'waktu' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_berita,id'
        ]);

        if ($request->hasFile('gambar_berita')) {
            // Upload gambar baru
            $gambarPath = $request->file('gambar_berita')->store('berita', 'public');
            // Hapus gambar lama
            Storage::delete($berita->gambar_berita);
            $berita->gambar_berita = $gambarPath;
        }

        $berita->judul = $validatedData['judul'];
        $berita->deskripsi_berita = $validatedData['deskripsi_berita'];
        $berita->waktu = $validatedData['waktu'];
        $berita->status = $validatedData['status'];
        $berita->kategori_id = $validatedData['kategori_id'];
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        // Hapus gambar dari storage
        Storage::delete($berita->gambar_berita);
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita deleted successfully');
    }

    public function showDetail($id)
    {
        $berita = Berita::find($id);
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();

        return view('detail-berita', compact('berita','beritaTerbaru','latestPersyaratan'));
    }
}
