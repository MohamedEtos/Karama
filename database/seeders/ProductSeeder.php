<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\User;
use App\Models\merchant;
use App\Models\productImg;
use App\Models\subCat;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $totalRecords = User::count();

        foreach (range(1, 200) as $index) {

        productImg::create([
            'userId'=> $faker->numberBetween(1, $totalRecords),
            'mainImage' => "https://picsum.photos/300/300?random=" . $faker->unique()->numberBetween(1, 1000),
            'img2' => "https://picsum.photos/300/300?random=" . $faker->unique()->numberBetween(1, 1000),
            'img3' => "https://picsum.photos/300/300?random=" . $faker->unique()->numberBetween(1, 1000),

        ]);

    }

        $totalRecordscat = category::count();
        $totalRecordssub = subCat::count();
        $totalRecordsimg = productImg::count();

        foreach (range(1, 200) as $index) {

        merchant::create([
            'userId'=>$faker->numberBetween(1, $totalRecords),
            'name'=>$faker->word,
            'categoryId'=>  $faker->numberBetween(1, $totalRecordscat),
            'subCat'=>$faker->numberBetween(1, $totalRecordssub),

            'productDescription'=>$faker->regexify('[a-zA-Z0-9]{' . 30 . '}'),
            'productDetalis'=>$faker->regexify('[a-zA-Z0-9]{' . 30 . '}'),
            'price'=>$faker->numberBetween(1, 9000),
            'discount'=>$faker->numberBetween(1, 99),
            'ThePriceAfterDiscount'=>$faker->numberBetween(1, 9000),
            'append'=>1,
            'imgId'=>$faker->numberBetween(1, $totalRecordsimg),
            'created_at'=>$faker->dateTimeThisYear($max = 'now', $timezone = null),
            'updated_at'=>$faker->dateTimeThisYear($max = 'now', $timezone = null),
        ]);

    }


    }
}
