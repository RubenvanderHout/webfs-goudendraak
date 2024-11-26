<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'password' => 'password',
        ]);

        $this->call([
            CategorySeeder::class,
            DishSeeder::class,
            TableSeeder::class,
        ]);
    }
}
