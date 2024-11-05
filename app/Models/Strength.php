<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strength extends Model
{
    use HasFactory;
    protected $filleable = ['titulo',
    'order',
    'descripcion',
    'icono',
    'descripcionshort',
    'link1',
    'imagen',
    'status'] ; 
}
