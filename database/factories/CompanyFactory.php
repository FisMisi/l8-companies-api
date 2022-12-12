<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'registration_number' => $this->faker->bothify('######-####'),
            'foundation_date' => $this->faker->date('Y-m-d'),
            'country' => $this->faker->country(),
            'zip_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'street_address' => $this->faker->streetAddress(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'owner' => $this->faker->name(),
            'employees' => $this->faker->numberBetween(5, 2000),
            'activity' => $this->faker->randomElement([
                'Car',
                'Building Industry',
                'IT',
                'Food',
                'Growing Plants',
            ]),
            'active' => $this->faker->boolean,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make($this->faker->word()),
        ];
    }
}
