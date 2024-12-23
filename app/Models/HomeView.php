<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeView extends Model
{
    use HasFactory;
    protected $fillable = [
        
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
        'url_image4section',

        'title5section',
        'description5section',
        'url_image5section',

        'title6section',
        'description6section',
        'url_image6section',
        
        'title7section',
        'description7section',
        'url_image7section',

        'title8section',
        'one_description8section',
        'two_description8section',
        'url_image8section',

        'subtitle9section',
        'title9section',
        'one_description9section',
        'two_description9section',

        'title10section',
        'description10section',
        'url_image10section',

        'title11section',
        'description11section',
        'url_image11section',
       
    ];
}
