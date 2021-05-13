<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show()
    {
    	return view('admin.menu', [
    		'title' => 'Меню',
    		'menus' => $this->headerMenu(),
    	]);
    }
}
