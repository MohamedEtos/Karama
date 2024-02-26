<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\userDetalis;
use Database\Factories\UserFactory;
use Database\Factories\UserDetailsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->create();
        // User::factory()->count(50)->create();
        userDetalis::factory()->count(50)->create();

        // $this->call([
            // UserSeeder::class,
        // ]);


    }
}
