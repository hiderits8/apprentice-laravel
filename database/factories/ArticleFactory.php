<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(20),
            'fav' => $this->faker->numberBetween(0, 500),
            'title' => $this->faker->realText(50),
            'lead' => $this->faker->realText(100),
            'text' => $this->faker->realText(500),
        ];
    }
}
