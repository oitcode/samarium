<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Webpage>
 */
class WebpageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'creator_id',
            'name' => $this->faker->words(2, true),
            'permalink' => Str::slug($this->faker->words(5, true)),
            'is_post' => false,
            'visibility' => 'public',
        ];
    }
}
