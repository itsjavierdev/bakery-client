<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'last_name',
        'email',
        'phone',
        'address',
        'city'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
