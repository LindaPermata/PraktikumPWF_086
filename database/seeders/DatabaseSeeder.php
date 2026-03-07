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
        try {
            $user = User::firstOrCreate(
                ['email' => 'linda@example.com'],
                [
                    'name' => 'Linda Permata',
                    'password' => bcrypt('password'),
                ]
            );

            \App\Models\Product::factory(20)->create([
                'user_id' => $user->id,
            ]);

            \App\Models\Category::factory(10)->create();
            
            $this->command->info('Seeding successful!');
        } catch (\Exception $e) {
            $this->command->error('Seeding failed: ' . $e->getMessage());
        }
    }
}
