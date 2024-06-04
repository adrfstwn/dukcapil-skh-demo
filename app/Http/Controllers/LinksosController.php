<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linksos;
use App\Models\Jam;
use App\Models\Kontak;

class LinksosController extends Controller
{
    public function index()
    {
        $linksos = Linksos::all();
        return view('admin.linksos.index', compact('linksos'));
    }

    // public function create()
    // {
    //     return view('admin.linksos.create');
    // }

    public function create()
{
    // Check if there are any existing contacts
    $existingLink = Linksos::first();

    // If there are existing contacts, still at the same page
    if ($existingLink) {
        return redirect()->route('linksos.index');
    }

    // If there are no existing contacts, show the create page
    return view('admin.linksos.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'instagram' => 'required|url',
            'facebook' => 'required|url',
            'x' => 'required|url',
            'yt' => 'required|url',
            'nama_instagram' => 'required|string',
            'nama_facebook' => 'required|string',
            'nama_x' => 'required|string',
            'nama_yt' => 'required|string',
        ]);

        Linksos::create($request->all());

        return redirect()->route('linksos.index')
            ->with('success', 'Linksos created successfully.');
    }

    public function edit($id)
    {
        $linksos = Linksos::findOrFail($id);
        return view('admin.linksos.edit', compact('linksos'));
    }

    public function update(Request $request, $id)
    {
        $linksos = Linksos::findOrFail($id);

        $request->validate([
            'instagram' => 'required|url',
            'facebook' => 'required|url',
            'x' => 'required|url',
            'yt' => 'required|url',
            'nama_instagram' => 'required|string',
            'nama_facebook' => 'required|string',
            'nama_x' => 'required|string',
            'nama_yt' => 'required|string',
        ]);

        $linksos->update($request->all());

        return redirect()->route('linksos.index')
            ->with('success', 'Linksos updated successfully');
    }

    public function destroy($id)
    {
        $linksos = Linksos::findOrFail($id);
        $linksos->delete();

        return redirect()->route('linksos.index')
            ->with('success', 'Linksos deleted successfully');
    }

    public function show()
{
    $jam = Jam::all();
    $kontak = Kontak::all();
    $linksos = Linksos::all();
    return view('profil-section.kontak', compact('linksos','jam','kontak'));
}
}
