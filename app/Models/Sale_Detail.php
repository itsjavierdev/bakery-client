<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Detail extends Model
{
    use HasFactory;

    protected $fillable=[
        'subtotal',
        'quantity'
    ];
}