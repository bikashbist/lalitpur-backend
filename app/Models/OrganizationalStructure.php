<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationalStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'departments',
        'status'
    ];

    protected $casts = [
        'departments' => 'array'
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