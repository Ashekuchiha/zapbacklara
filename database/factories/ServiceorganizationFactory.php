<?php

// namespace Database\Factories;

// use App\Models\Serviceorganization;
// use Illuminate\Database\Eloquent\Factories\Factory;

// class ServiceorganizationFactory extends Factory
// {
//     protected $model = Serviceorganization::class;

//     public function definition(): array
//     {
//         return [
//             'organizationName' => $this->faker->company,
//             'ownerName' => $this->faker->name,
//             'state' => $this->faker->state,
//             'city' => $this->faker->city,
//             'mapSelection' => json_encode([$this->faker->latitude, $this->faker->longitude]),
//             'address' => $this->faker->address,
//             'organizationBio' => $this->faker->paragraph,
//             'organizationDescription' => $this->faker->text,
//             'organizationWebsite' => $this->faker->url,
//             'phoneNumber' => $this->faker->phoneNumber,
//             'emergencyPhoneNumber' => $this->faker->phoneNumber,
//             'employeeNumbers' => $this->faker->numberBetween(1, 1000),
//             'organizationLogo' => null,
//             'organizationBanner' => null,
//             'tradeLicense' => null,
//             'organizationDocuments' => null,
//             'featured' => 'No',
//         ];
//     }
// }

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceorganizationFactory extends Factory
{
    protected $model = \App\Models\Serviceorganization::class;

    public function definition()
    {
        return [
            'organizationName' => $this->faker->company,
            'ownerName' => $this->faker->name,
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'mapSelection' => [$this->faker->latitude, $this->faker->longitude],
            'organizationBio' => $this->faker->text,
            'organizationDescription' => $this->faker->paragraph,
            'organizationWebsite' => $this->faker->url,
            'phoneNumber' => $this->faker->phoneNumber,
            'emergencyPhoneNumber' => $this->faker->phoneNumber,
            'employeeNumbers' => $this->faker->randomNumber(3),
            'organizationLogo' => null,
            'organizationBanner' => null,
            'tradeLicense' => null,
            'organizationDocuments' => null,
            'featured' => $this->faker->boolean,
        ];
    }
}

