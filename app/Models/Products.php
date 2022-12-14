<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'categories_id',
        'users_id',
        'brands_id',
        'sub_id',
        'size',
        'price',
        'price_new',
        'quantity',
        'image',
        'link',
        'content',
        'featured_product',
        'active'
    ];
    public function categories()
    {
        return $this->belongsTo(Categories::class,'categories_id','id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
    public function brands()
    {
        return $this->belongsTo(Brands::class,'brands_id','id');
    }
    public function subcategories() {
        return $this->belongsTo(Subcategories::class, 'sub_id', 'id');
    }
    public function Imagelibrary()
    {
        return $this->hasMany(ImageLibrary::class,'products_id','id');
    }
    public function wishlist()
    {
        $uid = Auth::user()['id'];
        return $this->belongsTo(Wishlist::class,'id','products_id')->where('users_id',$uid);
    }
}
