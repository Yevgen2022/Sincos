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
        $adminRole = Role::where('name', 'Admin')->first();
        User::factory()->create([
            'name' => 'Admin', // Ім'я адміністратора
            'email' => 'admin@example.com', // Email адміністратора
            'password' => bcrypt('password'), // Пароль адміністратора
            'role_id' => $adminRole->id, // Роль адміністратора
        ]);

        // Створення решти користувачів з випадковими ролями (не Admin)
        $roles = Role::where('name', '!=', 'Admin')->get(); // Всі ролі, окрім Admin
        User::factory(50)->create()->each(function ($user) use ($roles) {
            // Випадковим чином присвоюємо одну з ролей для кожного користувача
            $user->update([
                'role_id' => $roles->random()->id, // Випадкова роль з масиву
            ]);
        });
    }










//// Створити роль для адміністратора, якщо вона ще не існує
//        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
//
//        // Create one standard user-Admin
//        User::factory()->create([
//            'name' => 'Admin', // Standard name
//            'email' => 'admin@example.com', // Standard email
//            'password' => bcrypt('password'), // Standard пароль
//            'role_id' => $adminRole->id,
//        ]);
//
//        User::factory()->create([
//            'name' => 'Admin Two', // Standard name
//            'email' => 'admin2@example.com', // Standard email
//            'password' => bcrypt('password'), // Standard пароль
//            'role_id' => $adminRole->id,
//        ]);
//
//        // 10 random users
//        User::factory(50)->create();
//    }
}
