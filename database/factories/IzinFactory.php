<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IzinFactory extends Factory
{
    public function definition()
    {
        return [
            'tanggal' => date('Y-m-d'),
            'alasan' => fake()->realTextBetween(),
            'surat' => $this->faker->word(),
        ];
    }
}
