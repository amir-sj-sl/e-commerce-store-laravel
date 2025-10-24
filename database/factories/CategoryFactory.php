<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $seed = rand(110, 190);
        $name = fake()->words(2, true);
        return [
            'name' => $name,
            'image' => 'https://picsum.photos/id/'.$seed.'/600/300',
            'slug' => Str::slug($name . '-' . fake()->unique()->word),
            'description' => fake()->realText(500),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
