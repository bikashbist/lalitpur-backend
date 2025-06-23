<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenCharter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'introduction',
        'commitments',
        'working_days',
        'working_hours',
        'services',
        'status'
    ];

    protected $casts = [
        'commitments' => 'array',
        'services' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}