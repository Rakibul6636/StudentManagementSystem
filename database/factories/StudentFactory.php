<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName, // Generate a first name using the Faker library
            'last_name' => $this->faker->lastName, // Generate a last name using the Faker library
            'student_id' => $this->faker->unique()->randomNumber(), // Generate a unique student ID using the Faker library
            'age' => $this->faker->numberBetween(6, 30), // Generate a random age between 6 and 30 using the Faker library
        ];
    }
}
