<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShiftFactory extends Factory
{
    public function definition()
    {
        return [
            'tanggal' => date('Y-m-d'),
            'start' => date('H:i'),
            'end' => date('H:i'),
            'jobdesk' => fake()->realTextBetween()
        ];
    }
}
