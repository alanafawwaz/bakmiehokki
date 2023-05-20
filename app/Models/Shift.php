<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = ['pegawai_id', 'tanggal', 'start', 'end', 'jobdesk'];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'pegawai_id', 'id');
    }
}
