<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\userDetalis;
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
        userDetalis::factory()->count(50)->create();
        User::factory()->count(50)->create();

        // $this->call([
            // UserSeeder::class,
        // ]);

    }
}