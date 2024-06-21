<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Berita;
use App\Models\Persyaratan;
use App\Models\Download;
use Illuminate\Support\Facades\Storage;

class DasboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $submenus = Submenu::all();
        $beritas = Berita::all();

        // Jika gambar berita tidak null, atur URL gambar
        foreach ($beritas as $berita) {
            if ($berita->gambar_berita) {
                $berita->gambar_berita = asset(Storage::url($berita->gambar_berita));
            }
        }

        // Hitung jumlah berita, persyaratan, dan download
        $jumlahBerita = Berita::count();
        $jumlahPersyaratan = Persyaratan::count();
        $jumlahDownload = Download::count();

        // Kirim data ke view menggunakan compact
        return view('dashboard-admin', compact('menus', 'submenus', 'beritas', 'jumlahBerita', 'jumlahPersyaratan', 'jumlahDownload'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
