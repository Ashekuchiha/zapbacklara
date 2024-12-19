<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatesFactory extends Factory
{
    public function definition()
    {
        return [
            'StateName' => $this->faker->state,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
        ];
    }
}
