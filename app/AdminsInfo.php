<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminsInfo extends Model
{
    protected $table = 'admins_info';
    protected $fillable = [
			'name','email','phone','avatar','id_admins','new'
		];

		public function User(){
		    return $this->belongsTo('App\AdminsInfo', 'id_admins');
        }
}
