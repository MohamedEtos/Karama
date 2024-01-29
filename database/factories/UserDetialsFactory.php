<?php

namespace Database\Factories;

use App\Models\userDetalis;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\userDetalis>
 */
class UserDetialsSeederFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = userDetalis::class;

    public function definition()
    {
        return [
            'phone'=>fake()->randomDigit(),
            'whatsapp'=>fake()->randomDigit(),
            'facebook'=>Str::random(10),
            'website'=>Str::random(10),
            'location'=>fake()->address(),
            'bio'=>Str::random(30),
            'ProfileImage'=>'assets/img/defultUserImg/defultUserImg.webp',
            'coverImage'=>'assets/img/defultUserImg/defultCovverImg.webp',
            'nationalId'=>fake()->randomDigit(10),
            'categoryId' =>fake()->numberBetween(['1','5']),
        ];
    }
}
