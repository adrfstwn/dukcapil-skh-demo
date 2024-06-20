<?php

// app/Providers/ViewServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Linksos;
use App\Models\Jam;
use App\Models\Kontak;
use App\Models\Layanan;
use App\Models\Map;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Composer untuk header
        View::composer('layouts.header', function ($view) {
            // Ambil semua menu utama
            $menus = Menu::all();

            // Inisialisasi array untuk menyimpan semua submenu
            $allSubmenus = [];

            // Loop melalui setiap menu utama
            foreach ($menus as $menu) {
                // Ambil semua submenu yang terhubung dengan menu tertentu
                $submenus = Submenu::where('menu_id', $menu->id)->get();

                // Tambahkan submenu ke dalam array allSubmenus
                $allSubmenus[$menu->id] = $submenus;
            }

            $view->with('menu', $menus)->with('allSubmenus', $allSubmenus);
        });

        // Composer untuk footer
        View::composer('layouts.footer', function ($view) {
            $linksos = Linksos::all();
            $jam = Jam::all();
            $kontak = Kontak::all();
            $layanan = Layanan::all();
            $maps = Map::all();
            $view->with(compact('linksos', 'jam', 'kontak','layanan'));
        });
    }

    public function register()
    {
        //
    }
}
