<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_asesor',
        'nama',
        'email',
        'no_hp',
        'password',
        'prodis_id',
        'role',
    ];


    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodis_id');
    }
}
