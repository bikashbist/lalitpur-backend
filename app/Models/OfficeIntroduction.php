<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeIntroduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en', 'title_np',
        'description_en', 'description_np',
        'image',
        'objectives_en', 'objectives_np',
        'status'
    ];

    protected $casts = [
        'objectives_en' => 'array',
        'objectives_np' => 'array'
    ];
}
