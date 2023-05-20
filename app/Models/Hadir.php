<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadir extends Model
{
    use HasFactory;

    protected $fillable = ['pegawai_id', 'tanggal', 'jam'];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'pegawai_id', 'id');
    }
}
