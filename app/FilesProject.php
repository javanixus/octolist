<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilesProject extends Model
{
    protected $fillable = [
        'name', 'file_name', 'project_id',
    ];

    public function Project (){
        return $this->belongsTo('App\Project', 'project_id');
    }
}
