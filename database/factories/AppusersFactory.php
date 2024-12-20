<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appusers>
 */
class AppusersFactory extends Factory
{
    protected $model = \App\Models\Appusers::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'dob' => $this->faker->date(),
            'city' => $this->faker->city(),
            'profile' => 'profiles/default.png', // Default profile image path
            'password' => bcrypt('password'),
        ];
    }
}
