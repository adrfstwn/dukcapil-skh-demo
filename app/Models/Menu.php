<?php

namespace App\Models;
use App\Models\Submenu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $fillable = ['nama_menu','url'];

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }

    public function kontenMenus()
    {
        return $this->hasMany(KontenMenu::class, 'menu_id');
    }
}
