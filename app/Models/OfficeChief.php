<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeChief extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en', 'name_np',
        'position_en', 'position_np',
        'office_en', 'office_np',
        'message_en', 'message_np',
        'image', 'status'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
