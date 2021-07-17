<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'nama_mapel', 'kelas', 'semester', 'tahun'];
    protected $table = 'mapel';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rpp()
    {
        return $this->hasMany(RPP::class);
    }
}
