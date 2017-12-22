<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
	protected $table = 'TestUsers';

	protected $fillable = [
		'username','password'
	];
}
