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
            'tools' => '[
                {"nama":"bx bxl-html5","warna":"#E34F26"},
                {"nama":"bx bxl-css3","warna":"#1572B6"},
                {"nama":"bx bxl-javascript","warna":"#F7DF1E"},
                {"nama":"bx bxl-bootstrap","warna":"#7952B3"},
                {"nama":"bx bxl-php","warna":"#777BB4"}
            ]',
            'content' => fake()->text(100),
            'link' => fake()->url,
            'image' => fake()->filePath($dir = '/assets', $fullPath = false),
        ];
    }
}
