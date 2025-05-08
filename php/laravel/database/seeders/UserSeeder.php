<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 造 10 个激活用户
        User::factory()
            ->count(10)
            ->state(fn() => ['active' => 1])
            ->create();
    }
}
