<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

    protected $table = 'user';
    protected $fillable = [
        'name', 'username', 'password', 'is_member', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password',
    ];
}
