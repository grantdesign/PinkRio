<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
	protected $fillable = ['title', 'alias'];

    public function portfolio()
    {
    	return $this->hasOne('App\Portfolio', 'filter_alias', 'alias');
    }
}
