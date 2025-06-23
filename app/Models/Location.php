<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_category',
        'contact_name',
        'phone',
        'email',
        'address',
        'map',
        'image',
    ];
   

}
