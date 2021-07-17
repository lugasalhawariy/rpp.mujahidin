<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';
    use HasFactory;

    protected $fillable = [
        'nama_sekolah', 'nss', 'npsn', 'alamat', 'desa', 'kecamatan', 'kabupaten', 'status_sekolah', 'akreditasi', 'nama_kepsek', 'nbm'
    ];

    public function rpp()
    {
        return $this->hasMany(RPP::class);
    }
}
