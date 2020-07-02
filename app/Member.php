<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

	protected $fillable = ['event_id', 'first_name', 'surname', 'email'];

	protected $hidden = ['created_at', 'updated_at'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
