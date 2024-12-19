<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicesproviders;

class ServicesprovidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 records using the factory for Servicesproviders
        Servicesproviders::factory()->count(10)->create();
    }
}
