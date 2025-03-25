<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NosotrosView extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'subtitle1section', 
        'title1section', 
        'description1section', 
        'url_image1section',

        'title2section',
        'description2section',
        'url_image2section',

        'title3section', 
        'description3section',
        'url_image3section',

        'title4section',
        'description4section',
        // hasta aca de usa
    ];
}
