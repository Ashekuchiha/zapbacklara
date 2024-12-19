<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServicesprovidersFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'password' => bcrypt('password'),
            'service' => 'Clinic',
            'specialized' => 'good',
            'experience' => $this->faker->numberBetween(1, 20),
            'service_organization' => ['Super Admin'],
            'status' => 'Active',
            'amount' => '5',
            'type' => 'flat',
            'featured' => 'No',
            'certificate' => $this->faker->imageUrl(),
            'profile_image' => $this->faker->imageUrl(),
        ];
    }
}
