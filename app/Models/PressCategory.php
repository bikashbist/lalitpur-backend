<?php

// app/Models/PressCategory.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PressCategory extends Model
{
    protected $fillable = [
        'name_en',
        'name_np',
        'slug',
        'order',
        'is_active'
    ];
}