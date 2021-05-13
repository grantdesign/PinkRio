<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    public function show()
    {
    	return view('pink.portfolios', [
    		'title' => 'Портфолио',
    		'menus' => $this->headerMenu(),
    		'portfolios' => $this->portfolioAll(),
    		'categories' => $this->categoriesAll(),
    	]);
    }
}
