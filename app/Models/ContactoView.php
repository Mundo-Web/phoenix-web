<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoView extends Model
{
    use HasFactory;
    protected $fillable = [
        'title1section', 
        'title1section2', 
        'description1section', 
        'subtitle2section',
        'title2section',
        'description3section',
        'url_image2section',
        'title3section'
    ];
}
