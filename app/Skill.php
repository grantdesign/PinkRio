<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
	protected $fillable = ['title', 'alias'];

    public function portfolio()
    {
    	return $this->hasOne('App\Portfolio', 'skill_alias', 'alias');
    }
}
