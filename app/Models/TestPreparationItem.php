<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPreparationItem extends Model
{
    use HasFactory;
    protected $fillable = ['test_preparation_id', 'title', 'description', 'image'];

    public function testPreparation()
    {
        return $this->belongsTo(TestPreparation::class);
    }
}
