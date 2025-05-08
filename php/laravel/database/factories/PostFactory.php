<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 利用 Faker 工具生成一个 标题（sentence），这个句子大约有 3 到 7 个单词。
        $title = $this->faker->sentence(rand(3, 7));
        return [
            'title' => rtrim($title, '.'),
            'content' => $this->faker->paragraphs(rand(5, 15), true),
            // 如果数据库已有数据
            // Or Author::inRandomOrder()->first()->id if authors are already seeded
            'author_id' => Author::factory(),
            'status' => $this->faker->randomElement([0, 1, 2]), // 0:草稿 1:發佈 2:隱藏
        ];
    }
}
