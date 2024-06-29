<?php

namespace App\Http\Controllers;

use App\Models\Tupoksi;
use Illuminate\Http\Request;

class TupoksiController extends Controller
{
    public function index()
    {
        $tupoksis = Tupoksi::all();
        return view('admin.tupoksi.index', compact('tupoksis'));
    }

    public function create()
    {
        return view('admin.tupoksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi_tugaspokok' => 'required',
            'deskripsi_fungsi' => 'required',
            'deskripsi_visi' => 'required',
            'deskripsi_misi' => 'required',
        ]);

        Tupoksi::create([
            'deskripsi_tugaspokok' => $request->deskripsi_tugaspokok,
            'deskripsi_fungsi' => $request->deskripsi_fungsi,
            'deskripsi_visi' => $request->deskripsi_visi,
            'deskripsi_misi' => $request->deskripsi_misi,
        ]);

        return redirect()->route('tupoksi.index')->with('success', 'Tupoksi created successfully.');
    }

    public function show()
    {
        $tupoksis = Tupoksi::all();
        return view('tupoksi', compact('tupoksis'));
    }

    public function edit($id)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        return view('admin.tupoksi.edit', compact('tupoksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi_tugaspokok' => 'required',
            'deskripsi_fungsi' => 'required',
            'deskripsi_visi' => 'required',
            'deskripsi_misi' => 'required',
        ]);

        $tupoksi = Tupoksi::findOrFail($id);

        $tupoksi->deskripsi_tugaspokok = $request->deskripsi_tugaspokok;
        $tupoksi->deskripsi_fungsi = $request->deskripsi_fungsi;
        $tupoksi->deskripsi_visi = $request->deskripsi_visi;
        $tupoksi->deskripsi_misi = $request->deskripsi_misi;
        $tupoksi->save();

        return redirect()->route('tupoksi.index')->with('success', 'Tupoksi updated successfully.');
    }

    public function destroy($id)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        $tupoksi->delete();
        return redirect()->route('tupoksi.index')->with('success', 'Tupoksi deleted successfully.');
    }
}
