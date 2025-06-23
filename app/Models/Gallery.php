<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_name_en',
        'image_name_np',
        'title_en',
        'title_np',
        'category',
        'image_path',
        'video_url'
    ];

    public const CATEGORIES = [
        'photo' => 'Photo',
        'video' => 'Video'
    ];
}