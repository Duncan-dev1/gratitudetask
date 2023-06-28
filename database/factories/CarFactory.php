<?php

namespace Database\Factories;

use App\Models\CarOwner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'car_owner_id' => CarOwner::all()->random()->id,
        ];
    }
}
