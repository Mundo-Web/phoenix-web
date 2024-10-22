<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'take_product', 
        'payment_product', 
        'type_id',
        'apply_to',
        'visible',
        'status'
    ];

    public function discountType()
    {
        return $this->belongsTo(DiscountType::class, 'type_id');
    }

    // Relación: un descuento puede aplicarse a muchos productos
    public function products()
    {
        return $this->hasOne(Products::class, 'discount_id');
    }

}
