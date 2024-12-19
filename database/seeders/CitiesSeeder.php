<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cities;

class CitiesSeeder extends Seeder
{
    public function run()
    {
        Cities::factory(10)->create();
    }
}
