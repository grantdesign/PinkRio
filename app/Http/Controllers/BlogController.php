<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class BlogController extends Controller
{
    public function show()
    {
    	$articles = Article::orderBy('id', 'desc')->paginate(4);

    	$articles = $this->check($articles);

    	return view('admin.blog', [
    		'title' => 'Блог',
    		'articles' => $articles,
    	]);
    }
}
