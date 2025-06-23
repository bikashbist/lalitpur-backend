<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'section_title',
        'section_description',
        'process_steps',
        'required_documents',
        'download_links',
        'order',
        'status'
    ];

    protected $casts = [
        'process_steps' => 'array',
        'required_documents' => 'array',
        'download_links' => 'array',
        'status' => 'boolean'
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}