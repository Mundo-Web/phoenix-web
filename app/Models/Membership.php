<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'start_date',
        'email',
        'item',
        'amount',
        'cupon',
        'cupon_discount',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
