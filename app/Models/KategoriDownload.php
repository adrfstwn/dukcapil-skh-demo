<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDownload extends Model
{
    use HasFactory;
    protected $table = 'kategori_download';
    protected $fillable = [
        'nama_kategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriDownload::class, 'kategori_id');
    }
}
