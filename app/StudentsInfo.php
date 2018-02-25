<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsInfo extends Model
{
    protected $table = 'students_info';
    public function getNameAttribute($value){ // Accessor
        return ucwords($value);
    }

    public function getBioAttribute($value){ // Accessor
        return ucfirst($value);
    }

    public function setNameAttribute($value){ // Mutator
        return $this->attributes['name'] = strtolower($value);
    }

    public function setEmailAttribute($value){ // Mutator
        return $this->attributes['email'] = strtolower($value);
    }

    public function setBioAttribute($value){ // Mutator
        return $this->attributes['bio'] = strtolower($value);
    }

    protected $fillable = [
        'nis','name','email','bio','gender','phone','avatar','id_class','id_major','id_students','new'
    ];

//		Information Student with User Auth info
    public function User (){
        return $this->belongsTo('App\User', 'id_students');
    }

    public function ProjectMember (){
        return $this->belongsToMany('App\Project', 'project_members',
            'id_students', 'id_projects')->withTimestamps();
    }

    public function Card() {
        return $this->belongsToMany('App\Card', 'cards_member',
            'id_students', 'id_cards')->withTimestamps();
    }

}
