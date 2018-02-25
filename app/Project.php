<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Project extends Model
{

    protected $fillable = [
			'project_title','project_creator','project_deadline','project_link','project_description'
		];

    public function ProjectCreator (){
        return $this->belongsTo('App\User', 'project_creator');
    }

    public function ProjectLink(){
        return $this->belongsTo('App\TeacherInfo', 'project_link');
    }

    public function ProjectMember (){
        return $this->belongsToMany('App\StudentsInfo', 'project_members',
            'id_projects', 'id_students');
    }

    public function Card (){
        return $this->belongsToMany('App\Card', 'project_members',
            'id_projects', 'id_cards')->withTimestamps();
    }
}
