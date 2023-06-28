<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMechanicAssignment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class, 'mechanic_id');
    }
}
