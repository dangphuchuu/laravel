<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use app\models\Products;
use app\models\User;
class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'products_id',
        'users_id'
    ];
    public function products()
    {
        return $this->belongsTo(Products::class,'products_id','id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
}
