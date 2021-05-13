<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use Validator;

class CategoryEditController extends Controller
{
    public function execute(Category $category, Request $request)
    {
    	if ($request->isMethod('delete')) {
    		
    		$category->delete();

    		return redirect()->route('admin_categories')->with('status', 'Категория удалена');

    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'title' => 'required|max:255',
    			'alias' => 'required|max:255',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('category_edit', $category->id)->withErrors($validator);

    		$category->fill($input);

    		if ($category->save()) return redirect()->route('admin_categories')->with('status', 'Категория обновлена');

    	}

    	return view('admin.category_edit', [
    		'title' => 'Редактирование категории',
    		'category' => $category,
    	]);
    }
}
