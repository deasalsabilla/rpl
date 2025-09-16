<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'pendaftars';

    // Tentukan kolom yang dapat diisi massal
    protected $fillable = [
        'NIK',
        'nama',
        'email',
        'password',
        'noHP',
        'tempatLahir',
        'tglLahir',
        'agama',
        'sekolahasal',
        'NISN',
        'nmAyah',
        'nmIbu',
        'alamat',
        'RT',
        'RW',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'prodis_id',
        'jenisdaftar',
        'status',
        'foto',
    ];

    // Jika Anda ingin mendefinisikan relasi, misalnya ke Prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodis_id');
    }
}
