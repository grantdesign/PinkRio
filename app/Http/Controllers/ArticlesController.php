<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Comment;
use App\User;

class ArticlesController extends Controller
{
    public function show()
    {
    	$articles = Article::orderBy('id', 'desc')->paginate(3);

    	$articles = $this->check($articles);

    	$comments = Comment::orderBy('id', 'desc')->limit(3)->get();

    	return view('pink.articles', [
    		'title' => 'Блог',
    		'menus' => $this->headerMenu(),
    		'articles' => $articles,
    		'comments' => $comments,
            'categories' => $this->categoriesAll(),
    	]);
    }
}
