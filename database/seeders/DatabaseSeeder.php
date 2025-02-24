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
        // User::factory(10)->create();
        $this->call([
            DetailProfileSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'username'=>'dazai',
            'email' => 'test@example.com',
            'password' => 'admin12345'
        ]);
    }
}
