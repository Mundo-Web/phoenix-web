<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $fillable = ['meta_keywords','meta_description','meta_title','ig_token','address', 'inside', 'district', 'city', 'country', 'cellphone','office_phone', 'email', 'facebook', 'instagram','youtube', 'twitter', 'whatsapp', 'linkedin', 'tiktok' , 'form_email', 'business_hours', 'schedule', 'mensaje_whatsapp', 'aboutus', 'htop'];

}
