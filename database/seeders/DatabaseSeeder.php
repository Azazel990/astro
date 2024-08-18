<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'rohit',
            'email' => 'rohit@gmail.com',
            "password" => Hash::make("rohit123")
        ]);

        User::factory()->create([
            'name' => 'sam',
            'email' => 'sam@gmail.com',
            "password" => Hash::make("sam123")
        ]);
    }
}
