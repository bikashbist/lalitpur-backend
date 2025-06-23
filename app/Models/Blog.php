<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
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
        'is_active',
        'category'
    ];

    // Add this method to define categories
 // app/Models/Blog.php
public static function getCategories()
{
    return [
        'news' => [
            'en' => 'News',
            'np' => 'समाचार'
        ],
        'report' => [
            'en' => 'Report',
            'np' => 'प्रतिवेदन'
        ],
        'press_release' => [
            'en' => 'Press Release',
            'np' => 'प्रेस विज्ञप्ति'
        ],
        'policy' => [
            'en' => 'Policy',
            'np' => 'नीति तथा निर्देशन'
        ],
        'event' => [
            'en' => 'Event',
            'np' => 'कार्यक्रम'
        ],
        'article' => [
            'en' => 'Articles',
            'np' => 'लेखहरू'
        ]
    ];
}
}
