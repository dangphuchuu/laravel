<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'lastname',
        'firstname',
        'address',
        'district',
        'city',
        'phone',
        'email',
        'content',
        'total',
        'status'
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
}
