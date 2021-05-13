<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use Validator;

class BlogEditController extends Controller
{
    public function execute(Article $article, Request $request)
    {
    	if ($request->isMethod('delete')) {

    		$images = json_decode($article->img);

    		foreach ($images as $image) {
    			unlink(public_path('storage/'.$image));
    		}

    		$article->delete();

    		return redirect()->route('blog')->with('status', 'Статья удалена');

    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'title' => 'required|max:255',
    			'desc' => 'required',
    			'text' => 'required',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('blog_add')->withErrors($validator);

    		$article->fill($input);

    		if ($article->save()) return redirect()->route('blog')->with('status', 'Статья обновлена');

    	}

    	return view('admin.blog_edit', [
    		'title' => 'Редактирование статьи',
    		'article' => $article,
    		'categories' => $this->categoriesAll(),
    	]);
    }
}
