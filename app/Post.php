<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['quote', 'author_id'];

	public function author(){
		return $this->belongsTo('App\Author');
	}

	public function categories(){
		return $this->belongsToMany('App\Category','post_category');
	}
}
