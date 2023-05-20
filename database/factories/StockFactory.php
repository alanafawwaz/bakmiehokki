<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'ketersediaan' => rand(10, 50),
            'tanggal' => date('Y-m-d'),
        ];
    }
}
