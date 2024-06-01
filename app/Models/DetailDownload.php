<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDownload extends Model
{
    use HasFactory;
    protected $table = 'detaildownload';
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi_detail_download',
    ];
}
