<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'introduction',
        'services',
        'documents',
        'status'
    ];

    protected $casts = [
        'services' => 'array',
        'documents' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}