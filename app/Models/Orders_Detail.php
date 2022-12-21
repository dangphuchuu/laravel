<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'orders_id',
        'product_id',
        'name',
        'image',
        'quantity',
        'price'
        
    ];
}
