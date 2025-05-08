<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence();

        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->optional()->sentence(),
        ];
    }
}
