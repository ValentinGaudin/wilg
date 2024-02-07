<?php

namespace Database\Factories;

use App\Enums\PlanEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
final class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

        ];
    }

    /**
     * Create smart plan
     */
    public function startPlan(): PlanFactory
    {
        return $this->state(fn (array $attributes) => [
            'name' => PlanEnum::START->value,
            'slug' => Str::slug(PlanEnum::START->value),
            'level' => 1,
            'price' => 0,
            'type' => 0,
        ]);
    }

    /**
     * Create smart plan
     */
    public function smartPlan(): PlanFactory
    {
        return $this->state(fn (array $attributes) => [
            'name' => PlanEnum::SMART->value,
            'slug' => Str::slug(PlanEnum::SMART->value),
            'level' => 2,
            'price' => 4.99,
            'type' => 0,
        ]);
    }

    /**
     * Create premium plan
     */
    public function premiumPlan(): PlanFactory
    {
        return $this->state(fn (array $attributes) => [
            'name' => PlanEnum::PREMIUM->value,
            'slug' => Str::slug(PlanEnum::PREMIUM->value),
            'level' => 3,
            'price' => 12.99,
            'type' => 0,
        ]);
    }
}
