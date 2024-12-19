<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\States;

class StatesSeeder extends Seeder
{
    public function run()
    {
        States::factory(10)->create();
    }
}
