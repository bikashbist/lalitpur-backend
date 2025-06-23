<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    // If your table name is different than the plural of the model name,
    // you can specify the table name here
    // protected $table = 'visitors';

    // If you want to specify the fillable attributes
    protected $fillable = ['ip_address', 'user_agent', 'location'];

    // Optionally define relationships, accessors, or any other methods.
}
