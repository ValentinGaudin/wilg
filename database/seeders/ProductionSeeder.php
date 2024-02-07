<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Seed the application's production database.
     */
    public function run(): void
    {
        $this->callOnce([
            PlanSeeder::class,
        ]);
    }
}
