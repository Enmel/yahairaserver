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
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Seller',
            'email' => 'seller@example.com',
            'role' => 'seller',
        ]);

        User::factory()->create([
            'name' => 'Depositary',
            'email' => 'depositary@example.com',
            'role' => 'depositary',
        ]);

        User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'role' => 'manager',
        ]);

        $this->call(BrandSeeder::class);
        $this->call(ProductTypesSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(StoresSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
