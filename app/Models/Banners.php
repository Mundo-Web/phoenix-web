<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'title',
        'description',
        'title_btn',
        'url_btn',
        'image',
        'price',
        'potition',
        'url_page',
        'caracteristicas',
        'visible',
        'status',
       
    ];
}
