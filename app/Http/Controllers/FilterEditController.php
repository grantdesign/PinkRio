<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Filter;

use Validator;

class FilterEditController extends Controller
{
    public function execute(Filter $filter, Request $request)
    {
    	if ($request->isMethod('delete')) {
    		
    		$filter->delete();

    		return redirect()->route('filters')->with('status', 'Фильтр удален');

    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'title' => 'required|max:255',
    			'alias' => 'required|max:255|unique:filters',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('filter_edit', $filter->id)->withErrors($validator);

    		$filter->fill($input);

    		if ($filter->save()) return redirect()->route('filters')->with('status', 'Фильтр обновлен');

    	}

    	return view('admin.filter_edit', [
    		'title' => 'Редактирование фильтра',
    		'filter' => $filter,
    	]);
    }
}
