<?php

namespace App\Http\Controllers;

use App\Models\KontenMenu;
use App\Models\Menu;
use App\Models\KontenMenuUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KontenMenuController extends Controller
{
    public function index()
    {
        $kontenMenus = KontenMenu::with('menu')->paginate(10);
        return view('admin.konten-menu.index', compact('kontenMenus'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.konten-menu.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'judul' => 'required|string|max:255',
            'deskripsi_konten' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:DRAFT,PUBLISH',
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
                KontenMenuUrl::create([
                    'konten_menu_id' => $kontenMenu->id,
                    'nama_url' => $url['nama_url'],
                    'link_url' => $url['link_url']
                ]);
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
        $request->validate([
            'menu_id' => 'required',
            'judul' => 'required|string|max:255',
            'deskripsi_konten' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:DRAFT,PUBLISH',
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

        if (isset($data['urls'])) {
            KontenMenuUrl::where('konten_menu_id', $id)->delete();
            foreach ($data['urls'] as $url) {
                KontenMenuUrl::create([
                    'konten_menu_id' => $kontenMenu->id,
                    'nama_url' => $url['nama_url'],
                    'link_url' => $url['link_url']
                ]);
            }
        }

        return redirect()->route('konten-menu.index')->with('success', 'Konten menu updated successfully.');
    }
    public function destroy($id)
    {
        $kontenMenu = KontenMenu::findOrFail($id);
        $kontenMenu->delete();

        return redirect()->route('konten-menu.index')->with('success', 'Konten Menu deleted successfully.');
    }
}

