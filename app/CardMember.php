<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardMember extends Model
{
    protected $table = 'card_members';

    protected $hidden = [
			'created_at','updated_at'
		];
}
