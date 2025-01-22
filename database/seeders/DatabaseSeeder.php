<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void


    {

        $this->call(CategorySeeder::class);     //Create database with seeder

       // User::factory(20)->create();          //Create database with factory
        $this->call(UserSeeder::class);

        Product::factory(50)->create();       //Create database with factory

    }
}
