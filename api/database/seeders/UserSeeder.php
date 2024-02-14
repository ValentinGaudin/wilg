<?php

namespace Database\Seeders;

use App\Enums\PlanEnum;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Plan::query()->count()) {
            return;
        }

        User::factory()
            ->count(1)
            ->for(Plan::query()->where('slug', 'premium')->firstOrFail())
            ->state(fn ($attributes) => [
                'token_balance' => fake()->randomNumber(5),
                'email'         => 'admin@wilg.com'
            ])
            ->create();


        foreach (PlanEnum::cases() as $case) {
            $plan = Plan::query()
                ->where('slug', $case)
                ->firstOrFail();

            User::factory()
                ->count(1)
                ->for($plan)
                ->state(fn ($attributes) => [
                    'token_balance' => fake()->numberBetween(0, 4999),
                ])
                ->create();

            User::factory()
                ->count(3)
                ->for($plan)
                ->state(fn ($attributes) => [
                    'token_balance' => match (true) {
                        $case->value === PlanEnum::START->value => fake()->numberBetween(10000, 19999),
                        $case->value === PlanEnum::PREMIUM->value => fake()->numberBetween(20000, 100000),
                        default => fake()->numberBetween(5000, 9999),
                    },
                ])
                ->create();
        }
    }
}
