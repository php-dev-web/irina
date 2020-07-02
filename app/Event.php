<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

	public function member()
	{
	  return $this->hasOne('App\Member');
	}

}
