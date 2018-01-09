<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardMember extends Model
{
    protected $table = 'cards_members';

    protected $guarded = [
			'created_at','updated_at'
		];
}
