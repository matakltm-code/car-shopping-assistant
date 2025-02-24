<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Micheal Ataklt',
            'email' => 'matakltm.code@gmail.com',
            'role' => 'admin',
        ]);

        // Create 50 sample cars
        Car::factory(50)->create();

        // Optionally, you can generate embeddings for all cars after creation
        Car::all()->each->updateEmbedding();
    }
}
