<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsInfo extends Model
{
		protected $table = 'teachers_info';
		protected $fillable = [
			'nip','name','email','bio','gender','phone','avatar','id_teachers',
		];

		public function User(){
		    return $this->belongsTo('App\User', 'id_teachers');
        }
}
