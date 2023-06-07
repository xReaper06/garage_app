<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'platenumber' =>$this->faker->randomElement(['cc 4351','xx 1235','Df 4325']),
            'color' => $this->faker->colorName(),
            'model' => $this->faker->randomElement(['2013','2014','2015','2016','2017','2018','2019']),
            'yearbought'=> $this->faker->date(),
            'brand' => $this->faker->randomElement(['hundai','honda','ferrari','paganini']),
            'image' => $this->faker->image(),
        ];
    }
}
