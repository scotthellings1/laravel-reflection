<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique->company(),
            'email' => $this->faker->safeEmail(),
            'website' => $this->faker->url(),
            'logo' => $this->faker->image('storage/app/public', 100, 100, null ,false)
        ];
    }
}
