<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => '[
                {"nama": "bx bxl-gmail", "warna": "#D14836"},
                {"nama": "bx bxl-linkedin", "warna": "#0077B5"},
                {"nama": "bx bxl-instagram", "warna": "#E4405F"},
                {"nama": "bx bxl-telegram", "warna": "#0088CC"}
            ]',
            'name' => fake()->sentence(2),
            'link' => fake()->url,
        ];
    }
}
