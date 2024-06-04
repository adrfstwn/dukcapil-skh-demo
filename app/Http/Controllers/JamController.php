<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jam;
use App\Models\Kontak;

class JamController extends Controller
{
    public function index()
    {
        $jam = Jam::all();
        return view('admin.jam-operasi.index', compact('jam'));
    }

    public function create()
{
    // Check if there are any existing contacts
    $existingJam = Jam::first();

    // If there are existing contacts, still at the same page
    if ($existingJam) {
        return redirect()->route('jam.index');
    }

    // If there are no existing contacts, show the create page
    return view('admin.jam-operasi.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'weekday' => 'required',
            'jumat' => 'required',
            'sabtu' => 'required',
        ]);

        Jam::create($request->all());

        return redirect()->route('jam.index')
            ->with('success', 'Jam created successfully.');
    }

    public function edit($id)
    {
        $jam = Jam::findOrFail($id);
        return view('admin.jam-operasi.edit', compact('jam'));
    }

    public function update(Request $request, $id)
    {
        $jam = Jam::findOrFail($id);

        $request->validate([
            'weekday' => 'required',
            'jumat' => 'required',
            'sabtu' => 'required',
        ]);

        $jam->update($request->all());

        return redirect()->route('jam.index')
            ->with('success', 'Jam updated successfully');
    }

    public function destroy($id)
    {
        $jam = Jam::findOrFail($id);
        $jam->delete();

        return redirect()->route('jam.index')
            ->with('success', 'Jam deleted successfully');
    }

    public function show()
{
    $jam = Jam::all();
    $kontak = Kontak::all();
    return view('profil-section.kontak', compact('jam', 'kontak'));
}




}
