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
            'icon' => '[{"name":"gmail","value":2,"icon":"bx bxl-gmail","color":"#D14836"}]',
            'name' => fake()->sentence(2),
            'link' => fake()->url,
        ];
    }
}
