<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'prodis_id',
        'status',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodis_id');
        return $this->hasMany(Cpmk::class, 'cpmks_id');
    }
}
