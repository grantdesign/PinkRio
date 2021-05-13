<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function show()
    {
    	return view('admin.filters', [
    		'title' => 'Фильтры',
    		'filters' => $this->filterAll(),
    	]);
    }
}
