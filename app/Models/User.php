<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'telp', 'type', 'role',
        'password', 'gender', 'posisi', 'domisili',
    ];

    protected $hidden = ['password'];

    public function hadirs()
    {
        return $this->hasMany(Hadir::class, 'pegawai_id', 'id');
    }

    public function izins()
    {
        return $this->hasMany(Izin::class, 'pegawai_id', 'id');
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'pegawai_id', 'id');
    }
}
