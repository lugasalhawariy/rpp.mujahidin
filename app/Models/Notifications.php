<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    // role_id adalah id user yang akan dikirim notif

    protected $fillable = [
        'title', 'body', 'user_id', 'role_id', 'expired'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role_id()
    {
        return $this->belongsTo(Role::class);
    }
}
