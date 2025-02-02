<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();
        User::factory()->create([
            'name' => 'Admin', // Admin name
            'email' => 'admin@example.com', // Admin e-mail
            'password' => bcrypt('password'), //Admin password
            'role_id' => $adminRole->id, // Admin role
        ]);

        // Creating the rest of the users with random roles (not Admin)
        $roles = Role::where('name', '!=', 'Admin')->get(); // All roles except Admin
        User::factory(50)->create()->each(function ($user) use ($roles) {
            // We randomly assign one of the roles to each user
            $user->update([
                'role_id' => $roles->random()->id, // A random role from the array
            ]);
        });
    }
}
