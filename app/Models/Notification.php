<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory, HasRoles;

    // role_id adalah id user yang akan dikirim notif

    protected $fillable = [
        'title', 'body', 'user_id', 'role_id', 'expired'
    ];

    protected $table = 'notifications';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
