<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Berita;
use App\Models\KontenSubMenu;
use App\Models\KontenSubMenuUrl;
use App\Models\Persyaratan;
use Illuminate\Support\Facades\Storage;

class KontenSubMenuController extends Controller
{
    public function index()
    {
        $kontenSubMenu = KontenSubMenu::all();

        foreach ($kontenSubMenu as $konten) {
            $konten->gambar = asset(Storage::url($konten->gambar));
        }

        return view('admin.konten-submenu.index', compact('kontenSubMenu'));
    }

    public function create()
    {
        $submenus = Submenu::all();
        return view('admin.konten-submenu.create', compact('submenus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_konten' => 'nullable|string',
            'file' => 'nullable|file',
            'status' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'gambar' => 'nullable|image',
            'submenu_id' => 'required|exists:submenu,id',
            'urls' => 'array',
            'urls.*.nama_url' => 'nullable|string',
            'urls.*.link_url' => 'nullable|url',
            'new_urls' => 'array',
            'new_urls.*.nama_url' => 'nullable|string',
            'new_urls.*.link_url' => 'nullable|url',
        ]);


        $kontenSubMenu = new KontenSubMenu([
            'judul' => $validatedData['judul'],
            'deskripsi_konten' => $validatedData['deskripsi_konten'],
            'status' => $validatedData['status'],
            'tanggal' => $validatedData['tanggal'],
            'submenu_id' => $validatedData['submenu_id']
        ]);

        if ($request->hasFile('file')) {
            $kontenSubMenu->file = $request->file('file')->store('file_konten', 'public');
        }

        if ($request->hasFile('gambar')) {
            $kontenSubMenu->gambar = $request->file('gambar')->store('gambar_konten', 'public');
        }

        $kontenSubMenu->save();

        if (isset($validatedData['urls'])) {
            foreach ($validatedData['urls'] as $url) {
                if (!empty($url['nama_url']) && !empty($url['link_url'])) {
                    $kontenSubMenu->urls()->create($url);
                }
            }
        }


        return redirect()->route('konten.index')->with('success', 'Konten SubMenu created successfully.');
    }

    public function show($id)
    {
        $kontenSubMenu = KontenSubMenu::findOrFail($id);
        $kontenSubMenu->gambar = asset(Storage::url($kontenSubMenu->gambar));
        return view('konten-submenu', compact('kontenSubMenu'));
    }

    public function edit($id)
    {
        $kontenSubMenu = KontenSubMenu::findOrFail($id);
        $submenus = Submenu::all(); // Ambil semua submenu untuk digunakan dalam dropdown
        return view('admin.konten-submenu.edit', compact('kontenSubMenu', 'submenus'));
    }
    public function update(Request $request, $id)
    {
        $kontenSubMenu = KontenSubMenu::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_konten' => 'nullable|string',
            'file' => 'nullable|file',
            'status' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'gambar' => 'nullable|image',
            'submenu_id' => 'required|exists:submenu,id',
            'urls' => 'array',
            'urls.*.nama_url' => 'nullable|string',
            'urls.*.link_url' => 'nullable|url',
            'new_urls' => 'array',
            'new_urls.*.nama_url' => 'nullable|string',
            'new_urls.*.link_url' => 'nullable|url',
            'delete_urls' => 'array'
        ]);


        $kontenSubMenu->update($request->only('submenu_id', 'judul', 'deskripsi_konten', 'tanggal', 'status'));

        if ($request->hasFile('file')) {
            if ($kontenSubMenu->file) {
                Storage::disk('public')->delete($kontenSubMenu->file);
            }
            $kontenSubMenu->file = $request->file('file')->store('files', 'public');
        }

        if ($request->hasFile('gambar')) {
            if ($kontenSubMenu->gambar) {
                Storage::disk('public')->delete($kontenSubMenu->gambar);
            }
            $kontenSubMenu->gambar = $request->file('gambar')->store('images', 'public');
        }

        $kontenSubMenu->save();

        // Update existing URLs
        if ($request->has('urls')) {
            foreach ($request->input('urls') as $urlId => $urlData) {
                $url = KontenSubMenuUrl::findOrFail($urlId);
                $url->update($urlData);
            }
        }

        // Add new URLs
        if ($request->has('new_urls')) {
            foreach ($request->input('new_urls') as $newUrlData) {
                if (!empty($newUrlData['nama_url']) && !empty($newUrlData['link_url'])) {
                    $kontenSubMenu->urls()->create($newUrlData);
                }
            }
        }


        // Remove URLs
        if ($request->has('delete_urls')) {
            KontenSubMenuUrl::destroy($request->input('delete_urls'));
        }

        return redirect()->route('konten.index')->with('success', 'Konten SubMenu updated successfully');
    }

    public function destroy($id)
    {
        $kontenSubMenu = KontenSubMenu::findOrFail($id);
        $kontenSubMenu->delete();

        return redirect()->route('konten.index')->with('success', 'Konten SubMenu deleted successfully.');
    }

    public function showBySubmenu($submenu_id)
    {
        // Ambil semua konten sub-menu yang berelasi dengan submenu_id
        $kontenSubMenu = KontenSubMenu::where('submenu_id', $submenu_id)
            ->with('urls') // Include related URLs
            ->get();

        // Konversi URL gambar agar dapat diakses melalui asset helper
        foreach ($kontenSubMenu as $konten) {
            $konten->gambar = asset(Storage::url($konten->gambar));
        }

        // Ambil informasi submenu yang berelasi
        $submenu = Submenu::findOrFail($submenu_id);

        // Ambil berita terbaru
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(3)->get(); // Misalnya mengambil 5 berita terbaru

        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();

        // Tampilkan view dengan data kontenSubMenu dan submenu
        return view('konten-submenu', compact('kontenSubMenu', 'submenu', 'beritaTerbaru','latestPersyaratan'));
    }
}
