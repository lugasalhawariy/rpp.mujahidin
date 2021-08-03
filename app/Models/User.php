<?php

namespace App\Models;

use App\Models\Silabus;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'sekolah_id',
        'no_telp',
        'tgl_lahir',
        'nbm_guru',
        'nip_guru',
        'alamat',
        'riwayat_pendidikan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // sekolah memiliki banyak user
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }

    // user memiliki banyak rpp
    public function rpp()
    {
        return $this->hasMany(RPP::class);
    }

    // user memiliki banyak silabus
    public function silabus()
    {
        return $this->hasMany(Silabus::class);
    }
}
