<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenMenu;
use App\Models\Menu;
use App\Models\Berita;
use App\Models\KontenMenuUrl;
use App\Models\Persyaratan;
use Illuminate\Support\Facades\Storage;

class KontenMenuController extends Controller
{
    public function index()
    {
        $kontenMenus = KontenMenu::all();

        foreach ($kontenMenus as $konten) {
            $konten->gambar = asset(Storage::url($konten->gambar));
        }

        return view('admin.konten-menu.index', compact('kontenMenus'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.konten-menu.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'judul' => 'required|string|max:255',
            'deskripsi_konten' => 'nullable|string',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:DRAFT,PUBLISH',
            'urls' => 'array',
            'urls.*.nama_url' => 'nullable|string',
            'urls.*.link_url' => 'nullable|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('file_konten_menu', 'public');
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_menu', 'public');
        }

        $kontenMenu = KontenMenu::create($data);

        if (isset($data['urls'])) {
            foreach ($data['urls'] as $url) {
                if (!empty($url['nama_url']) && !empty($url['link_url'])) {
                    KontenMenuUrl::create([
                        'konten_menu_id' => $kontenMenu->id,
                        'nama_url' => $url['nama_url'],
                        'link_url' => $url['link_url']
                    ]);
                }
            }
        }

        return redirect()->route('konten-menu.index')->with('success', 'Konten menu created successfully.');
    }


    public function edit($id)
    {
        $kontenMenu = KontenMenu::with('urls')->findOrFail($id);
        $menus = Menu::all();
        return view('admin.konten-menu.edit', compact('kontenMenu', 'menus'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'judul' => 'required|string|max:255',
            'deskripsi_konten' => 'nullable|string',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:DRAFT,PUBLISH',
            'urls' => 'array',
            'urls.*.nama_url' => 'nullable|string',
            'urls.*.link_url' => 'nullable|url',
            'new_urls' => 'array',
            'new_urls.*.nama_url' => 'nullable|string',
            'new_urls.*.link_url' => 'nullable|url',
            'delete_urls' => 'array'
        ]);

        $kontenMenu = KontenMenu::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('file')) {
            if ($kontenMenu->file) {
                Storage::disk('public')->delete($kontenMenu->file);
            }
            $data['file'] = $request->file('file')->store('file_konten_menu', 'public');
        }

        if ($request->hasFile('gambar')) {
            if ($kontenMenu->gambar) {
                Storage::disk('public')->delete($kontenMenu->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar_menu', 'public');
        }

        $kontenMenu->update($data);

        // Update or create URLs
        if (isset($data['urls'])) {
            KontenMenuUrl::where('konten_menu_id', $id)->delete();
            foreach ($data['urls'] as $url) {
                if (!empty($url['nama_url']) && !empty($url['link_url'])) {
                    KontenMenuUrl::create([
                        'konten_menu_id' => $kontenMenu->id,
                        'nama_url' => $url['nama_url'],
                        'link_url' => $url['link_url']
                    ]);
                }
            }
        }

        // Add new URLs
        if (isset($data['new_urls'])) {
            foreach ($data['new_urls'] as $newUrl) {
                if (!empty($newUrl['nama_url']) && !empty($newUrl['link_url'])) {
                    KontenMenuUrl::create([
                        'konten_menu_id' => $kontenMenu->id,
                        'nama_url' => $newUrl['nama_url'],
                        'link_url' => $newUrl['link_url']
                    ]);
                }
            }
        }

        // Remove URLs
        if (isset($data['delete_urls'])) {
            KontenMenuUrl::destroy($data['delete_urls']);
        }

        return redirect()->route('konten-menu.index')->with('success', 'Konten menu updated successfully.');
    }


    public function destroy($id)
    {
        $kontenMenu = KontenMenu::findOrFail($id);

        // Delete related URLs first
        $kontenMenu->urls()->delete();

        // Delete the konten menu item
        $kontenMenu->delete();

        return redirect()->route('konten-menu.index')->with('success', 'Konten Menu deleted successfully.');
    }

    public function showByMenu($menu_id)
    {
        // Ambil semua konten menu yang berelasi dengan menu_id
        $kontenMenu = KontenMenu::where('menu_id', $menu_id)
            ->with('urls') // Include related URLs
            ->get();

        // Konversi URL gambar agar dapat diakses melalui asset helper
        foreach ($kontenMenu as $konten) {
            $konten->gambar = asset(Storage::url($konten->gambar));
        }

        // Ambil informasi menu yang berelasi
        $menu = Menu::findOrFail($menu_id);

        // Ambil berita terbaru
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(3)->get(); // Misalnya mengambil 3 berita terbaru

        // Tambahkan relasi kontenMenus ke setiap objek $menu
        $menu->kontenMenus = $kontenMenu;

        $latestPersyaratan = Persyaratan::where('status', 'PUBLISH')->orderBy('created_at', 'desc')->take(5)->get();


        // Tampilkan view dengan data kontenMenu, menu, dan beritaTerbaru
        return view('konten-menu', compact('kontenMenu', 'menu', 'beritaTerbaru','latestPersyaratan'));
    }

}
