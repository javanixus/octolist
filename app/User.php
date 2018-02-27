<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function setUsernameAttribute($value){ // Mutator
        return $this->attributes['username'] = strtolower($value);
    }

    public function setPasswordAttribute($value){ // Mutator
        return $this->attributes['password'] = bcrypt($value);
    }

    protected $fillable = [
        'role', 'username', 'password','email',
    ];

    protected $hidden = [
        'password',
    ];

//    Relation One to one | User has Info user
    public function ProjectCreator(){
        return $this->hasOne('App\Project', 'project_creator');
    }

    public function InfoUser(){
        return $this->hasOne('App\StudentsInfo', 'id_students');
    }

    public function InfoTeacher(){
        return $this->hasOne('App\TeachersInfo', 'id_teachers');
    }

    public function InfoAdmin(){
        return $this->hasOne('App\AdminsInfo', 'id_students');
    }

}
