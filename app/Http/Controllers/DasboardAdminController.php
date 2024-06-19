<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class DasboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Ambil semua data dari model
         $menus = Menu::all();
         $submenus = Submenu::all();
         $beritas = Berita::all();
         foreach ($beritas as $berita) {
            // Jika gambar berita tidak null, atur URL gambar
            if ($berita->gambar_berita) {
                $berita->gambar_berita = asset(Storage::url($berita->gambar_berita));
            }
        }

         // Kirim data ke view menggunakan compact
         return view('dashboard-admin', compact('menus', 'submenus', 'beritas'));
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
