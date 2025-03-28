<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['order', 'title', 'description', 'url_image', 'name_image', 'status', 'visible', 'namebutton', 'link'];
}
