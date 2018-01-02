<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    	protected $table = 'Project_Members';

		 protected $fillable = [
			 'id_project','id_students'
		 ];
}
