<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'nama',
        'deskripsi',
        'status',
    ];
    
    public function hakAkses()
    {
        return $this->hasMany(HakAkses::class, 'role_id');
    }

    // Relasi: satu role bisa punya banyak pengguna
    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'role_id');
    }
}
