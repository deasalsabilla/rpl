<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodis';

    protected $fillable = [
        'kodeprodi',
        'namaprodi',
        'jenjang',
        'status'
    ];

    // Relasi dengan pendaftar
    public function pendaftars()
    {
        return $this->hasMany(Pendaftar::class, 'prodis_id');
    }

    public function makuls()
    {
        return $this->hasMany(Makul::class, 'prodis_id');
    }

    public function cpmks()
    {
        return $this->hasMany(Cpmk::class, 'prodis_id');
    }

    public function asesors()
    {
        return $this->hasMany(asesor::class, 'prodis_id');
    }

    
}
