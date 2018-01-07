<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    protected $fillable = [
			'card_title','card_description','image_card'
		];
}
