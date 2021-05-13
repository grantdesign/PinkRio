<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Comment;

use Validator;

class ArticleController extends Controller
{
    public function show(Article $article, Request $request)
    {
    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'name' => 'required|max:255',
    			'email' => 'required|email',
    			'site' => 'required|max:255',
    			'text' => 'required',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('article', $article->id)->withErrors($validator)->withInput();

    		$comment = new Comment;

    		$comment->fill($input);

    		if ($comment->save()) return redirect()->route('article', $article->id)->with('status', 'Комментарий добавлен');

    	}

    	$article->img = json_decode($article->img);

    	$articles = Article::orderBy('id', 'desc')->limit(3)->get();

    	$articles = $this->check($articles);

    	$comments = Comment::orderBy('id', 'desc')->limit(3)->get();

    	return view('pink.article', [
    		'title' => $article->title,
    		'menus' => $this->headerMenu(),
    		'article' => $article,
    		'articles' => $articles,
    		'comments' => $comments,
            'categories' => $this->categoriesAll(),
    	]);
    }
}
