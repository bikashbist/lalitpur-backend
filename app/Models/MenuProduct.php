<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuProduct extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'menu_category_id',
        'name',
        'price',
        'image',
        'description',
        'reasons_to_study',
        'scholarships',
        'application_process',
    ];
    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }
}
