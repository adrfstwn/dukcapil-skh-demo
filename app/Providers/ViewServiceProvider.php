<?php

// app/Providers/ViewServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.header', function ($view) {
            $menu = Menu::all(); // Misalnya, Anda mengambil semua data menu dari model Menu
            $view->with('menu', $menu);
        });
    }
}
