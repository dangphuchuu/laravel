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
    public function orders()
    {
        return $this->belongsTo(Orders::class,'orders_id','id');
    }
    public function products()
    {
        return $this->hasmany(Products::class,'product_id','id');
    }
}
