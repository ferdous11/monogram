<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
	public function options ()
	{
		return $this->hasMany('App\Option');
	}
}
