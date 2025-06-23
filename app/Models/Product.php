<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'image', 'price', 'description',
        'brand', 'condition', 'stock',
        'category', 'shop_category'
    ];
}
