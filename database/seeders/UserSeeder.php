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
        // Create one standard user
        User::factory()->create([
            'name' => 'Admin', // Standard name
            'email' => 'admin@example.com', // Standard email
            'password' => bcrypt('password'), // Standard пароль
            'role' => 'admin',
        ]);

        // 10 random users
        User::factory(10)->create();



    }
}
