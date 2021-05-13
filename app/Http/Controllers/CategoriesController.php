<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Article;
use App\Comment;

use Paginate;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	$articles = Article::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(3);

    	$articles = $this->check($articles);

    	$comments = Comment::orderBy('id', 'desc')->limit(3)->get();

    	return view('pink.categories', [
    		'title' => $category->title,
    		'menus' => $this->headerMenu(),
    		'articles' => $articles,
    		'comments' => $comments,
    		'categories' => $this->categoriesAll(),
    	]);
    }
}
