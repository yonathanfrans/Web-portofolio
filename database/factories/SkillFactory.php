<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $levels = ['Basic', 'Intermediate', 'Experienced'];
        $types = ['Frontend Development', 'Backend Development'];

        return [
            'name' => fake()->sentence(2),
            'level' => fake()->randomElement($levels),
            'type' => fake()->randomElement($types),
        ];
    }
}
