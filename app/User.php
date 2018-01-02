<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function getNameAttribute($name){ // Accessor
        return ucwords(strtolower($name));
    }

    public function setNameAttribute($name){ // Mutator
        return $this->attributes['name'] = strtolower($name);
    }
    public function setPasswordAttribute($password){ // Mutator
        return $this->attributes['password'] = bcrypt($password);
    }

    protected $fillable = [
        'name', 'username', 'email', 'password', 'nis', 'bio', 'gender', 'phone', 'id_class', 'id_major'
    ];

    protected $hidden = [
        'password',
    ];
}