<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(2),
            'tools' => '[{"name":"php","value":5,"icon":"bx bxl-php","color":"#777BB4"},{"name":"bootstrap","value":4,"icon":"bx bxl-bootstrap","color":"#7952B3"}]',
            'content' => fake()->text(100),
            'link' => fake()->url,
            'image' => fake()->filePath($dir = '/assets', $fullPath = false),
        ];
    }
}
