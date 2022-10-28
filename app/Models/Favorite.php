<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
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
        return $this->belongsTo(Users::class,'users_id','id');
    }
}
