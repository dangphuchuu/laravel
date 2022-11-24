<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subcategories;
class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active'
    ];
    public function Subcategories()
    {
        return $this->hasMany(Subcategories::class,'cat_id','id');
    }
}
