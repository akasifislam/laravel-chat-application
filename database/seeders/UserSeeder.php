<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->count(10)->create();

        User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@mail.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@mail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
