<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealPlan;

class MealPlanSeeder extends Seeder
{
    public function run()
    {
        MealPlan::factory()->count(10)->create();
    }
}
