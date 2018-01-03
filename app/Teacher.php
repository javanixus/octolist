<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
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
			'name','username','password','email','gender','phone','avatar'
		];
}
