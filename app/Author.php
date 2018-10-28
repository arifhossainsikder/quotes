<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
    	'name',
		'photo_id',
		'bio',
	];

    public function photo(){
    	return $this->belongsTo('App\Photo');
	}

	public function posts(){
    	return $this->hasMany('App\Post');
	}
}
