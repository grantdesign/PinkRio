<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Menu;
use App\Portfolio;
use App\Category;
use App\Filter;
use App\Skill;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function check($collection) // преобразование json строки в массив
    {
    	$collection->transform(function($item, $key) {

    	  	$item->img = json_decode($item->img);
    		return $item;
    	
    	});

    	return $collection;
    }

    protected function headerMenu() // главное меню
    {
        return Menu::all();
    }

    protected function portfolioAll() // вывод портфолио
    {
        $portfolios = Portfolio::orderBy('id', 'desc')->paginate(5);
        return $this->check($portfolios);
    }

    protected function categoriesAll() // вывод категорий
    {
        return Category::all();
    }

    protected function filterAll() // вывод фильтров
    {
        return Filter::all();
    }

    protected function skillAll() // вывод умений
    {
        return Skill::all();
    }
}
