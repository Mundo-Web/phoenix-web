<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'valor',
        'descripcion',
        'color',
        'imagen'
    ];

    public function galeria()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
