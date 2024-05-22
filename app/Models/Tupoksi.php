<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    use HasFactory;
    
    protected $table = 'tupoksi'; // Nama tabel dalam database
    
    protected $fillable = [
        'nama_tupoksi',
        'nama_tugaspokok',
        'deskripsi_tugaspokok',
        'nama_fungsi',
        'deskripsi_fungsi',
        'nama_visimisi',
        'nama_visi',
        'deskripsi_visi',
        'nama_misi',
        'deskripsi_misi',
    ];
}
