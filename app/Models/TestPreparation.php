<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPreparation extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image','service_category_id'];
    public function items()
    {
        return $this->hasMany(TestPreparationItem::class);
    }
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
