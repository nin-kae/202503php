<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        // seeder 文件需要执行的话需要在这里调用/指定
        $this->call([
            CategoriesSeeder::class,
            ProductsSeeder::class,
            UserSeeder::class,
            AuthorSeeder::class, // 创建 10 个用户
            TagSeeder::class, // 创建 20 个标签
            PostSeeder::class, // 创建 50 个帖子
        ]);
    }
}
