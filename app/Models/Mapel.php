<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sekolah_id', 
        'nama_mapel', 
        'kelas', 
        'semester', 
        'tahun'
    ];
    protected $table = 'mapel';


    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function rpp()
    {
        return $this->hasMany(RPP::class);
    }
}
