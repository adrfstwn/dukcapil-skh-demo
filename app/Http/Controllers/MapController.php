<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;
use App\Models\Linksos;
use App\Models\Kontak;
use App\Models\Jam;
use App\Models\Layanan;


class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps = Map::all();
        return view('admin.map.index', compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('admin.map.create');
    // }

    public function create()
{
    // Check if there are any existing contacts
    $existingLink = Map::first();

    // If there are existing contacts, still at the same page
    if ($existingLink) {
        return redirect()->route('map.index');
    }

    // If there are no existing contacts, show the create page
    return view('admin.map.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'alamat' => 'required|string|max:255',
            'link_map' => 'required|url'
        ]);

        // Simpan data map ke database
        $map = new Map;
        $map->alamat = $validatedData['alamat'];
        $map->link_map = $validatedData['link_map'];
        $map->save();

        return redirect()->route('map.index')->with('success', 'Map berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $map = Map::findOrFail($id);
    //     return view('admin.map.show', compact('map'));
    // }
    public function show()
{
    $maps = Map::all();
    $jam = Jam::all();
    $kontak = Kontak::all();
    $linksos = Linksos::all();
    return view('profil-section.kontak', compact('linksos','jam','kontak','maps'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $map = Map::findOrFail($id);
        return view('admin.map.edit', compact('map'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'alamat' => 'required|string|max:255',
            'link_map' => 'required|url'
        ]);

        $map = Map::findOrFail($id);
        $map->alamat = $validatedData['alamat'];
        $map->link_map = $validatedData['link_map'];
        $map->save();

        return redirect()->route('map.index')->with('success', 'Map berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $map = Map::findOrFail($id);
        $map->delete();

        return redirect()->route('map.index')->with('success', 'Map berhasil dihapus');
    }
}
