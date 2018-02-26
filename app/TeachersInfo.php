<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersInfo extends Model
{
		protected $table = 'teachers_info';
		protected $fillable = [
			'nip','name','email','bio','gender','phone','avatar','id_teachers','new'
		];

		public function User(){
		    return $this->belongsTo('App\User', 'id_teachers');
        }

        public function ProjectLink(){
            return $this->hasMany('App\Project', 'project_link');
        }

}
