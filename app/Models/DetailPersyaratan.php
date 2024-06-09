<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPersyaratan extends Model
{
    use HasFactory;
    protected $table = 'detailpersyaratan';
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi_detail_persyaratan',
    ];
}
