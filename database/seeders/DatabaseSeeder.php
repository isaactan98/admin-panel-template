<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // * seeder create 4 roles, Super Admin, Admin, Staff, Customer 
        Role::factory()->create([
            'role_name' => 'Super Admin'
        ]);
        Role::factory()->create([
            'role_name' => 'Admin'
        ]);
        Role::factory()->create([
            'role_name' => 'Staff'
        ]);
        Role::factory()->create([
            'role_name' => 'Customer'
        ]);
    }
}
