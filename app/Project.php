<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['name','pitch','github','user_id','language_id'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

  public function language()
	{
		return $this->belongsTo('App\Language');
	}

  public function devs()
  	{
  		return $this->belongsToMany('App\User');
  	}
}
