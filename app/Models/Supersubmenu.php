<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supersubmenu extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'menu';
    protected $fillable = [
        'nama_super-submenu',
        'submenu_id'
    ];
}
