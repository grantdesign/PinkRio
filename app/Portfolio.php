<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	protected $fillable = ['title', 'desc', 'text', 'img', 'customer', 'filter_alias', 'skill_alias'];

    public function skill()
    {
    	return $this->belongsTo('App\Skill', 'skill_alias', 'alias');
    }

    public function filter()
    {
    	return $this->belongsTo('App\Filter', 'filter_alias', 'alias');
    }
}
