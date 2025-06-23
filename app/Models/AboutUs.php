<?php
// app/Models/AboutUs.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = ['about_us_group_id', 'title', 'description', 'image'];

    public function group()
    {
        return $this->belongsTo(AboutUsGroup::class, 'about_us_group_id');
    }
    
}
