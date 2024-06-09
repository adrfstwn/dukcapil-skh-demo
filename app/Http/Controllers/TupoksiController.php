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
            'nama_tupoksi' => 'required',
            'nama_tugaspokok' => 'required',
            'deskripsi_tugaspokok' => 'required',
            'nama_fungsi' => 'required',
            'deskripsi_fungsi' => 'required',
            'nama_visimisi' => 'required',
            'nama_visi' => 'required',
            'deskripsi_visi' => 'required',
            'nama_misi' => 'required',
            'deskripsi_misi' => 'required',
        ]);


        Tupoksi::create([
            'nama_tupoksi' => $request->nama_tupoksi,
            'nama_tugaspokok' => $request->nama_tugaspokok,
            'deskripsi_tugaspokok' => $request->deskripsi_tugaspokok,
            'nama_fungsi' => $request->nama_fungsi,
            'deskripsi_fungsi' => $request->deskripsi_fungsi,
            'nama_visimisi' => $request->nama_visimisi,
            'nama_visi' => $request->nama_visi,
            'deskripsi_visi' => $request->deskripsi_visi,
            'nama_misi' => $request->nama_misi,
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
            'nama_tupoksi' => 'required',
            'nama_tugaspokok' => 'required',
            'deskripsi_tugaspokok' => 'required',
            'nama_fungsi' => 'required',
            'deskripsi_fungsi' => 'required',
            'nama_visimisi' => 'required',
            'nama_visi' => 'required',
            'deskripsi_visi' => 'required',
            'nama_misi' => 'required',
            'deskripsi_misi' => 'required',
        ]);

        $tupoksi = Tupoksi::findOrFail($id);

        $tupoksi->nama_tupoksi = $request->nama_tupoksi;
        $tupoksi->nama_fungsi = $request->nama_fungsi;
        $tupoksi->nama_tugaspokok = $request->nama_tugaspokok;
        $tupoksi->deskripsi_tugaspokok = $request->deskripsi_tugaspokok;
        $tupoksi->deskripsi_fungsi = $request->deskripsi_fungsi;
        $tupoksi->nama_visimisi = $request->nama_visimisi;
        $tupoksi->nama_visi = $request->nama_visi;
        $tupoksi->deskripsi_visi = $request->deskripsi_visi;
        $tupoksi->nama_misi = $request->nama_misi;
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
