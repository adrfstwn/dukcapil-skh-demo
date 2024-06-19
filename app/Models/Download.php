<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $table = 'download';
    protected $fillable = [
        'judul',
        'deskripsi_download',
        'kategori_id',
        'file',
    ];


    public function kategori()
    {
        return $this->belongsTo(KategoriDownload::class, 'kategori_id');
    }
}
