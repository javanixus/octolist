<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    protected $fillable = [
			'card_title','card_description','image_card'
		];

    public function Project () {
        return $this->belongsToMany('App\Project', 'project_cards',
            'id_cards', 'id_projects');
    }

    public function IdStudent () {
        return $this->belongsToMany('App\StudentInfo', 'cards_member',
            'id_cards', 'id_students');
    }
}
