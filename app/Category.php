<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['title', 'alias'];

    public function article()
    {
        return $this->hasMany('App\Article', 'category_id', 'id');
    }
}
