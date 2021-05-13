<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPortfoliosController extends Controller
{
    public function show()
    {
    	return view('admin.portfolios', [
    		'title' => 'Портфолио',
    		'portfolios' => $this->portfolioAll(),
    	]);
    }
}
