<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    use HasFactory;

    protected $table = 'hak_akses';

    protected $fillable = [
        'role_id',
        'menu_id',
        'status',
    ];

    // relasi ke Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // relasi ke Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
