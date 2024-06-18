<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $table = 'submenu';

    protected $fillable = ['menu_id', 'parent_id', 'nama_submenu', 'url'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function kontenSubMenus()
    {
        return $this->hasMany(KontenSubMenu::class);
    }
}
