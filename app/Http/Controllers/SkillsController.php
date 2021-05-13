<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function show()
    {
    	return view('admin.skills', [
    		'title' => 'Умения',
    		'skills' => $this->skillAll(),
    	]);
    }
}
