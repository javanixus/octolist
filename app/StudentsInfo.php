<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsInfo extends Model
{
		protected $table = 'students_info';
		protected $fillable = [
			'nis','name','email','bio','gender','phone','avatar','id_class','id_major','id_students',
		];

//		Information Student with User Auth info
        public function User (){
            return $this->belongsTo('App\User', 'id_students');
        }
}
