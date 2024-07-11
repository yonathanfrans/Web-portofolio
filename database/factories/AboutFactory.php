<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'achievement' => fake()->sentence(5),
            'path' => fake()->filePath($dir = '/file', $fullPath = false),
            'content' => fake()->text(500),
        ];
    }
}
