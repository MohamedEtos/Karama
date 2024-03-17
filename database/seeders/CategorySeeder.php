<?php

namespace Database\Seeders;

use App\Models\subCat;
use App\Models\category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $index) {
            Category::create([
                'name' => $faker->unique()->name,
                'catimg' => "https://picsum.photos/300/300?random=" . $faker->unique()->numberBetween(1, 1000)
            ]);
        }


        $totalRecords = Category::count();



        foreach (range(1, 200) as $index) {
            subCat::create([
                'categoryId'=> $faker->numberBetween(1, $totalRecords),
                'name' => $faker->word
    ]);
        }

        // foreach (range(1, 10) as $index) {
        //     subCat::create([
        //         'categoryId'=> $faker->randomDigit(),
        //         'name' => $faker->word
        //     ]);
        // }




    }
}
