<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Profession;
use Illuminate\Support\Str;
use App\Models\WorkPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'work_email' => fake()->safeEmail(),
            'address' => fake()->address(),
            'work_position_id' => WorkPosition::inRandomOrder()->first(),
            'profession_id' => Profession::inRandomOrder()->first(),
            'department_id' => Department::inRandomOrder()->first(),
            'phone_number' => fake()->phoneNumber(),
            'date_of_employment' => fake()->dateTimeBetween('-30years', '-1month'),
            'licence_number' => rand(1000,9000),
            'licence_start_date' => fake()->dateTimeBetween('-3years', '-1month'),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
