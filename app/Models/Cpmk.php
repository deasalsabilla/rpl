<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cpmk extends Model
{
    protected $fillable = [
        'kode_cpmk',
        'deskripsi',
        'makuls_id'  // Pastikan nama field ini sesuai
    ];

    public function makul()
    {
        return $this->belongsTo(Makul::class, 'makuls_id');
    }
}

