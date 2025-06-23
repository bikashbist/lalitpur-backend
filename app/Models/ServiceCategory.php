<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'image_icon', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function sproducts()
    {
        return $this->hasMany(ServiceProduct::class);
    }

    public function testPreparations()
    {
        return $this->hasMany(TestPreparation::class);
    }

    public function items()
    {
        return $this->hasMany(TestPreparation::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}