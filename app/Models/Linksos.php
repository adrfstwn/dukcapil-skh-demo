<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linksos extends Model
{
    use HasFactory;

    protected $table = 'linksos';
    protected $fillable = [
        'instagram',
        'facebook',
        'x',
        'yt',
        'nama_instagram',
        'nama_facebook',
        'nama_x',
        'nama_yt'
    ];
}
