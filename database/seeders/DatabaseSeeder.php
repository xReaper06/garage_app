<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bike;
use App\Models\Car;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory(10)->create();

        foreach ($users as $user) {
            Bike::factory()->create([
                'user_id' => $user->id,
            ]);
            Car::factory()->create([
                'user_id' =>$user->id,
            ]);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
