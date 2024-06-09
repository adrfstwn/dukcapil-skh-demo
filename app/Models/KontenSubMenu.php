<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenSubMenu extends Model
{
    use HasFactory;

    protected $table = 'konten_submenu';
    protected $fillable = ['judul', 'deskripsi_konten', 'tanggal', 'file', 'gambar', 'submenu_id','status'];

    public function submenu()
    {
        return $this->belongsTo(Submenu::class);
    }
}
