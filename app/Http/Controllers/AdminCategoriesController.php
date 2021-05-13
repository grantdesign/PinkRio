<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class AdminCategoriesController extends Controller
{
    public function show()
    {
    	$categories = Category::paginate(5);

    	return view('admin.categories', [
    		'title' => 'Категории',
    		'categories' => $categories,
    	]);
    }
}
