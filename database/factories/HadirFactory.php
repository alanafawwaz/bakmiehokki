<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HadirFactory extends Factory
{
    public function definition()
    {
        return [
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i'),
        ];
    }
}
