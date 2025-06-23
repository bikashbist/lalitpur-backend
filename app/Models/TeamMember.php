<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

 protected $fillable = [
    'name_en',
    'name_np',
    'position_en',
    'position_np',
    'image',
    'order',
    'status'
];


    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        return 'https://via.placeholder.com/150';
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}