<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'nilai_X' => rand(1, 33),
            'nilai_Y' => rand(1, 23),
            'nilai_Z' => rand(1, 18),
            'nilai_W' => rand(1, 13),
            'created_by_id' => User::class
        ];
    }
}
