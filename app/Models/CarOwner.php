<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'car_owner_id');
    }
}
