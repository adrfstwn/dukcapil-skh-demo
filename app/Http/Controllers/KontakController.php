<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Jam;
use App\Models\Linksos;
use App\Models\Map;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::all();
        return view('admin.kontak.index', compact('kontaks'));
    }

    public function create()
{
    // Check if there are any existing contacts
    $existingKontak = Kontak::first();

    // If there are existing contacts, still at the same page
    if ($existingKontak) {
        return redirect()->route('kontak.index');
    }

    // If there are no existing contacts, show the create page
    return view('admin.kontak.create');
}


    public function store(Request $request)
    {
        $request->validate([
            'telp' => 'required',
            'fax' => 'required',
            'wa_layan' => 'required',
            'email' => 'required|email',
        ]);

        Kontak::create($request->all());

        return redirect()->route('kontak.index')
            ->with('success', 'Kontak created successfully.');
    }

    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request, $id)
    {
        $kontak = Kontak::findOrFail($id);

        $request->validate([
            'telp' => 'required',
            'fax' => 'required',
            'wa_layan' => 'required',
            'email' => 'required|email',
        ]);

        $kontak->update($request->all());

        return redirect()->route('kontak.index')
            ->with('success', 'Kontak updated successfully');
    }

    public function destroy($id)
{
    $kontak = Kontak::findOrFail($id);
    $kontak->delete();

    return redirect()->route('kontak.index')
        ->with('success', 'Kontak deleted successfully');
}


public function show()
{
    $maps = Map::all();
    $jam = Jam::all();
    $kontak = Kontak::all();
    $linksos = Linksos::all();
    return view('profil-section.kontak', compact('linksos','jam','kontak','maps'));
}
}
