<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSceduling extends Model
{
    use HasFactory;

    protected $table = "payment_scedulings";
    
    protected $fillable = [
        'user_id',
        'user_name',
        'card_name',
        'card_number',
        'card_cvc',
        'expire_day',
        'expire_year',
        'currency',
        'description',
        'continue',
        'messages',
        'price'
    ];
}
