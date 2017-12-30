<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'nis', 'bio', 'gender', 'phone', 'id_class', 'id_major'
    ];

    protected $hidden = [
        'password',
    ];
}
