<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;
    protected $table = 'tags_xproducts';
    protected $fillable = [
        'producto_id',
        'tag_id'
    ];
}
