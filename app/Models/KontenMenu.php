<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\KontenMenuUrl;

class KontenMenu extends Model
{
    use HasFactory;
    protected $table = 'konten_menu';
    protected $fillable = ['judul', 'deskripsi_konten', 'tanggal', 'file', 'gambar', 'menu_id','status'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function urls()
    {
        return $this->hasMany(KontenMenuUrl::class,'konten_menu_id', 'id');
    }
}
