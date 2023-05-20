<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $fillable = ['pegawai_id', 'tanggal', 'alasan', 'surat'];

    public function pegawai()
    {
        return $this->belongsTo(User::class);
    }
}
