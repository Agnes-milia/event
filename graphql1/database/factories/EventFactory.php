<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'start' => fake()->date(),
            'early_bird_price' => fake()->numberBetween(2000, 20000),
            'price_multiplier' => fake()->randomFloat(1.1, 4),
            'early_bird_until' => fake()->date()
        ];
    }
}
