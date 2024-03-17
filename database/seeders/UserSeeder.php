<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\category;

use App\Models\pointRules;
use App\Models\userDetalis;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $totalRecordscat = Category::count();


        foreach (range(1, 200) as $index) {
            userDetalis::create([
                'phone' => $faker->numberBetween(1000000000, 9999999999),
                'facebook' => 'https://www.facebook.com/' .$faker->userName,
                'website' => $faker->url,
                'location' => $faker->word,
                'bio' => $faker->text,
                'whatsapp'=>$faker->numberBetween(1000000000, 9999999999),
                'nationalId'=>$faker->numberBetween(1000000000, 9999999999),
                'categoryId'=>$faker->numberBetween(1, $totalRecordscat),
                'coverImage'=>"https://picsum.photos/1000/400?random=" . $faker->unique()->numberBetween(1, 1000),
                'ProfileImage'=>"https://picsum.photos/300/300?random=" . $faker->unique()->numberBetween(1, 1000),
                'created_at'=>$faker->dateTimeThisYear($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTimeThisYear($max = 'now', $timezone = null),
            ]);


        }

        $totalRecords = userDetalis::count();

        foreach (range(1, 200) as $index) {

            $user = User::create([
                'name' => $faker->word,
                'email' => $faker->safeEmail(),
                'userCode' => $faker->numberBetween(10000000, 99999999),
                'subtype' => $faker->randomElement(['user', 'merchant']),
                'startOfSubscription' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
                'endOfSubscription' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
                'password' => Hash::make('password'),
                'userDetalis'=>$faker->numberBetween(1, $totalRecords),
                'roles_name' =>$faker->randomElement(['مشترك', 'تاجر']),
                'created_at'=>$faker->dateTimeThisYear($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTimeThisYear($max = 'now', $timezone = null),
            ]);
            // $user->assignRole('مشترك');

        }
        $totalRecords2 = User::count();

        foreach (range(1, 200) as $index) {
        pointRules::create([
            'merchantId'=>$faker->numberBetween(1, $totalRecords2),
            'exchangeLimit'=>0,
            'transferPoints'=>0,
        ]);
    }







    }
}
