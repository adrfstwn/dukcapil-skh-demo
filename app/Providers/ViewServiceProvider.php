<?php

// app/Providers/ViewServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Submenu;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
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
    }
}

