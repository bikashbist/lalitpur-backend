<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'service_name',
        'required_documents',
        'order',
        'status'
    ];

    protected $casts = [
        'required_documents' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}