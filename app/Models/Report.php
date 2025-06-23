<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
     use HasFactory;
     protected $fillable = [
        'sub_title_en',
        'sub_title_np',
        'title_en',
        'title_np',
        'description_en',
        'description_np',
        'image_path',
        'slug',
        'is_active'
    ];
}
