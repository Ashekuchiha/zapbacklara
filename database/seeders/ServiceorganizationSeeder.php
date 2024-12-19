<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serviceorganization;

class ServiceorganizationSeeder extends Seeder
{
    public function run()
    {
        Serviceorganization::factory()->count(10)->create();
    }
}
