<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Jika nama tabel berbeda dengan plural "menus", bisa ditentukan manual:
    protected $table = 'menus';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'nama',
        'url',
        'ikon',
        'parent_id',
        'urutan',
        'status',
    ];
    
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    /**
     * Relasi ke induk menu (parent)
     */
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
