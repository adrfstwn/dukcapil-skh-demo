<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KontenMenu;

class KontenMenuUrl extends Model
{
    use HasFactory;

    protected $table = 'konten_menu_url';
    protected $fillable = ['konten_menu_id', 'nama_url', 'link_url'];

    public function kontenMenu()
    {
        return $this->belongsTo(KontenMenu::class);
    }
}
