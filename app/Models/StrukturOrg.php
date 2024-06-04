<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrg extends Model
{
    use HasFactory;
    protected $table = 'strukturorg';
    protected $fillable = [
        'judul',
        'file',
    ];
}
