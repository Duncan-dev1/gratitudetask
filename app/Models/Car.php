<?php

namespace App\Models;

use App\Models\CarOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['registration_number', 'color'];

    public function owner()
    {
        return $this->belongsTo(CarOwner::class, 'car_owner_id');
    }
}
