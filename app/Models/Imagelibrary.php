<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Imagelibrary extends Model
{
    use HasFactory;
    protected $fillable = [
        'products_id',
        'image_library'
    ];
    public function products()
    {
        return $this->belongsTo(Products::class,'products_id','id');
    }
    
}
