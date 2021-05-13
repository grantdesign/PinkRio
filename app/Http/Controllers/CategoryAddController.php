<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use Validator;

class CategoryAddController extends Controller
{
    public function execute(Request $request)
    {
    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'title' => 'required|max:255',
    			'alias' => 'required|max:255',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('category_add')->withErrors($validator)->withInput();

    		$category = new Category;

    		$category->fill($input);

    		if ($category->save()) return redirect()->route('admin_categories')->with('status', 'Категория добавлена');

    	}

    	return view('admin.category_add', [
    		'title' => 'Добавление категории',
    	]);
    }
}
