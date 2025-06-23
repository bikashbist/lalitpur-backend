<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'domestic_tourists',
        'foreign_tourists',
        'growth_rate',
        'order'
    ];

    // Calculate total tourists
    public function getTotalTouristsAttribute()
    {
        return $this->domestic_tourists + $this->foreign_tourists;
    }

    // Format numbers with Nepali comma style
    public function getFormattedDomesticAttribute()
    {
        return $this->formatNumber($this->domestic_tourists);
    }

    public function getFormattedForeignAttribute()
    {
        return $this->formatNumber($this->foreign_tourists);
    }

    public function getFormattedTotalAttribute()
    {
        return $this->formatNumber($this->total_tourists);
    }

    private function formatNumber($number)
    {
        return str_replace(',', ',', number_format($number));
    }

    // Ordered scope
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'desc');
    }
}