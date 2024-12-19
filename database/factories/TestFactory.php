<?php

// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\test>
//  */
// class TestFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             //
//         ];
//     }
// }


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TestFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'password' => bcrypt('password'), // Default password
            'email' => $this->faker->unique()->safeEmail,
            'profileImage' => $this->faker->imageUrl(100, 100, 'people'),
            'birthday' => $this->faker->date(),
            'favoriteColors' => json_encode($this->faker->randomElements(['green', 'black', 'white'], rand(1, 3))),
        ];
    }
}
