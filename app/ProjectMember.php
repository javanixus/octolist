<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    	protected $table = 'project_members';

		 protected $fillable = [
			 'id_projects','id_students'
		 ];
}
