<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RPP extends Model
{
    use HasFactory;

    protected $table = 'rpp';
    protected $fillable = [
        'user_id',
        'sekolah_id',
        'mapel_id',
        'status',
        'alokasi_waktu',
        'pendekatan',
        'strategi',
        'metode_rpp',
        'teknik_materi',
        'teknik_penilaian',
        'alat',
        'bentuk',
        'kompetensi_dasar',
        'ipk',
        'tujuan',
        'materi_rpp',
        'langkah_rpp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
}
