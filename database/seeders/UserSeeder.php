<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Izin;
use App\Models\Hadir;
use App\Models\Shift;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('rahasia'),
            'telp' => '081234567890',
            'gender' => 'L',
            'type' => 'full',
            'domisili' => 'malang',
            'role' => 'admin'
        ]);

        User::factory()
            ->count(3)
            ->sequence(
                ['posisi' => 'kitchen'],
                ['posisi' => 'dishwash'],
                ['posisi' => 'gudang'],
            )
            ->sequence(
                ['gender' => 'L'],
                ['gender' => 'P'],
            )
            ->sequence(
                ['type' => 'full'],
                ['type' => 'part'],
            )
            ->has(Hadir::factory()->count(1), 'hadirs')
            ->has(Izin::factory()->count(1), 'izins')
            ->has(Shift::factory()->count(1), 'shifts')
            ->create();
    }
}
