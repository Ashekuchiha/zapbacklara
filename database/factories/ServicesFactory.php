<?php

// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\services>
//  */
// class ServicesFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             'name' => $this->faker->word,
//         'description' => $this->faker->sentence,
//         'icon' => null,
//         'featured' => $this->faker->randomElement(['Yes', 'No']),
//         'status' => $this->faker->randomElement(['Active', 'Inactive']),
//         'amount' => $this->faker->randomFloat(2, 10, 100),
//         'type' => $this->faker->randomElement(['flat', 'percentage']),
//         'bookingsFee' => $this->faker->randomFloat(2, 5, 50),
//         'bookingType' => $this->faker->randomElement(['INR', 'USD']),
//         ];
//     }
// }


namespace Database\Factories;

use App\Models\Services;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicesFactory extends Factory
{
    protected $model = Services::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'icon' => null,
            'featured' => $this->faker->randomElement(['Yes', 'No']),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'amount' => $this->faker->numberBetween(50, 100),
            'type' => $this->faker->randomElement(['flat', 'percent']),
            'bookingsFee' => $this->faker->numberBetween(10, 30),
            'bookingType' => $this->faker->currencyCode,
        ];
    }
}