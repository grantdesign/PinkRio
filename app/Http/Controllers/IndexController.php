<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;
use App\Portfolio;
use App\Skill;
use App\Filter;
use App\Article;
use App\User;
use App\Category;

class IndexController extends Controller
{
    public function show()
    {
    	$sliders = Slider::all();

    	$portfolioRandOne = Portfolio::inRandomOrder()->first();
    	$portfolioRandOne->img = json_decode($portfolioRandOne->img);
    	
    	$portfolios = Portfolio::take(4)->orderBy('id', 'desc')->get();
    	$portfolios = $this->check($portfolios);

    	$articles = Article::take(3)->orderBy('id', 'desc')->get();
    	$articles = $this->check($articles);

    	return view('pink.index', [
    		'title' => 'Pink Rio | A strong, powerful and multiporpose WordPress Theme',
    		'menus' => $this->headerMenu(),
    		'sliders' => $sliders,
    		'portfolioRandOne' => $portfolioRandOne,
    		'portfolios' => $portfolios,
    		'articles' => $articles,
            'categories' => $this->categoriesAll(),
    	]);
    }
}
