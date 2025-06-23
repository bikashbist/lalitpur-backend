<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamLalitpurMember extends Model
{
    use HasFactory;

   protected $fillable = [
        'image_path',
        'name_en',
        'name_np',
        'position_en',
        'position_np',
        'phone',
        'email',
        'is_spokesperson',
        'order'
    ];

    protected $casts = [
        'is_spokesperson' => 'boolean',
        'order' => 'integer'
    ];
}