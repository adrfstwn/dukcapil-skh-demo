<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;
    protected $table = 'persyaratan';

    protected $fillable = [
        'judul',
        'deskripsi_persyaratan',
        'kategori_id',
        'file'
    ];
    public function kategori()
    {
        return $this->belongsTo(KategoriPersyaratan::class, 'kategori_id');
    }

}
