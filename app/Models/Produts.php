<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produts extends Model
{
    use HasFactory;

    protected $fillable=[
        'image',
        'images',
        'name',
        'title',
        'price',
        'order',
        'status',
    ];
    protected $image;    
}
