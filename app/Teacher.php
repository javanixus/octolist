<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
			'name','username','password','email','gender','phone','avatar'
		];
}
