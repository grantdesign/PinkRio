<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['name', 'email', 'site', 'text', 'article_id', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function article()
    {
    	return $this->belongsTo('App\Article', 'article_id', 'id');
    }
}
