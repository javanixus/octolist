<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Project extends Model
{

    protected $fillable = [
			'project_title','project_creator','project_deadline'
		];
}
