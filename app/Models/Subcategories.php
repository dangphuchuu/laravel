<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categories;
use App\Models\Products;
class Subcategories extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'sort_name',
        'cat_id',
        'active'
    ];
    public function categories()
    {
        return $this->belongsTo(Categories::class,'cat_id','id');
    }
    public function products()
    {
        return $this->hasMany(Products::class,'sub_id','id');
    }
}
