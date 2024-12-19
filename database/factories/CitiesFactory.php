<?php

namespace Database\Factories;

use App\Models\Cities;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitiesFactory extends Factory
{
    protected $model = Cities::class;

    public function definition()
    {
        return [
            'CityName' => $this->faker->city,
            'StateName' => $this->faker->state,
            'pin' => $this->faker->postcode,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
        ];
    }
}
