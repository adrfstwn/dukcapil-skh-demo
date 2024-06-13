<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenSubmenuUrl extends Model
{
    use HasFactory;

    protected $table = 'konten_submenu_url';
    protected $fillable = ['konten_submenu_id', 'nama_url', 'link_url'];

    public function kontenSubMenu()
    {
        return $this->belongsTo(KontenSubMenu::class);
    }
}

