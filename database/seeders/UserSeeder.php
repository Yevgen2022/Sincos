<?php

namespace Database\Seeders;

use App\Models\Role;
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

// Створити роль для адміністратора, якщо вона ще не існує
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        //$userRole = Role::firstOrCreate(['name' => 'User']);

        // Create one standard user-Admin
        User::factory()->create([
            'name' => 'Admin', // Standard name
            'email' => 'admin@example.com', // Standard email
            'password' => bcrypt('password'), // Standard пароль
            'role_id' => $adminRole->id,
        ]);

        User::factory()->create([
            'name' => 'Admin Two', // Standard name
            'email' => 'admin2@example.com', // Standard email
            'password' => bcrypt('password'), // Standard пароль
            'role_id' => $adminRole->id,
        ]);

        // 10 random users
        User::factory(50)->create();

    }
}
