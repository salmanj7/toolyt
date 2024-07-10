<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'rented_at',
        'return_at',
        'discount_percentage',
        'price',
        'document_id'
    ];
}
