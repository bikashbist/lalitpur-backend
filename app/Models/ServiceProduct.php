<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProduct extends Model
{
    use HasFactory;
  protected $fillable = ['service_category_id', 'title', 'description','image'];

    public function scategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
