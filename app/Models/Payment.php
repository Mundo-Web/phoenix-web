<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cargo_id',
        'item_id',
        'item',
        'amount',
        'payment_type',
        'cupon',
        'cupon_discount',
        'data',
        'email',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
