<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serviceorganization;

class ServiceorganizationSeeder extends Seeder
{
    public function run(): void
    {
        Serviceorganization::factory(10)->create();
    }
}
