<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Plan::query()->count()) {
            return;
        }

        Plan::factory()->count(1)->startPlan()->create();
        Plan::factory()->count(1)->smartPlan()->create();
        Plan::factory()->count(1)->premiumPlan()->create();
    }
}
