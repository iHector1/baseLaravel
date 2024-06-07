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
        $this->call(RoleSedder::class);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ])->assignRole(['Admin']);
        User::factory()->create([
            'name' => 'reader',
            'email' => 'reader@example.com',
            'password' => bcrypt('password'),
        ])->assignRole(['Reader']);
        User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@example.com',
            'password' => bcrypt('password')
        ])->assignRole(['Editor']);

    }
}
