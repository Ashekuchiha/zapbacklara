<?php

namespace Database\Seeders;

use App\Models\Appusers;
use Illuminate\Database\Seeder;

class AppusersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appusers::factory()->count(10)->create(); // Seed 10 dummy users
    }
}
