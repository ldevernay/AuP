<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['name','pitch','github','creator_id'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
