<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;

class PortfolioController extends Controller
{
    public function show(Portfolio $portfolio)
    {
    	$portfolio->img = json_decode($portfolio->img);

    	return view('pink.portfolio', [
    		'title' => $portfolio->title,
    		'menus' => $this->headerMenu(),
    		'portfolio' => $portfolio,
    		'portfolios' => $this->portfolioAll(),
            'categories' => $this->categoriesAll(),
    	]);
    }
}
