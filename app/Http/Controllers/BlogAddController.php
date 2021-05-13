<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use Validator;
use Arr;

class BlogAddController extends Controller
{
    public function show(Request $request)
    {
    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'title' => 'required|max:255',
    			'desc' => 'required',
    			'text' => 'required',
    			'min_img' => 'required|image',
    			'max_img' => 'required|image',
    			'path_img' => 'required|image',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('blog_add')->withErrors($validator)->withInput();

    		if ($request->hasFile('min_img') && $request->hasFile('max_img') && $request->hasFile('path_img')) {

    			$min_dir = $request->file('min_img')->store('articles', 'public');
    			$max_dir = $request->file('max_img')->store('articles', 'public');
    			$path_dir = $request->file('path_img')->store('articles', 'public');

    			$img = ['mini' => $min_dir, 'max' => $max_dir, 'path' => $path_dir];

    			$img = json_encode($img);

    			$input = Arr::except($input, ['min_img', 'max_img', 'path_img']);

    			$input = Arr::add($input, 'img', $img);

    		}

    		$article = new Article;

    		$article->fill($input);

    		if ($article->save()) return redirect()->route('blog')->with('status', 'Статья добавлена');
    	}

    	return view('admin.blog_add', [
    		'title' => 'Добавление статьи',
    		'categories' => $this->categoriesAll(),
    	]);
    }
}
