<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'logo',
        'name',
        'title',
        'phone',
        'email',
        'address',
        'linkfanpage',
        'copyright',
        'worktime'
    ];
}
