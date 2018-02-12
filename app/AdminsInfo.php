<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsInfo extends Model
{
		protected $table = 'admins_info';
		protected $fillable = [
			'name','email','phone','avatar','id_admins',
		];

		public function User(){
		    return $this->belongsTo('App\AdminsInfo', 'id_admins');
        }
}
