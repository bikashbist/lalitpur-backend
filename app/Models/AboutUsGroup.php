<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsGroup extends Model
{
    use HasFactory;
    protected $fillable = [];

 
        public function aboutUsEntries()
    {
        return $this->hasMany(AboutUs::class);
    }
}
