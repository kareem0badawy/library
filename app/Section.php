<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Section extends Model
{
	use SoftDeletes;

	public function books()
	{
		//model name & foreign key 

		return $this->hasMany('App\Book');
	}
}
