<?php

namespace Database\Factories;

use App\Models\Organiser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'date' => fake()->dateTimeThisYear(),
            'city' => fake()->city(),
            'organiser_id' => Organiser::inRandomOrder()->first(),
            'price' => rand(100,400),
            'credits' => rand(1,10),
        ];
    }
}
