<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => implode('\n\n', fake()->paragraphs(rand(3, 7))),
            'obtained' => implode('\n\n', fake()->paragraphs(rand(3, 7))),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true)
        ];
    }
}
