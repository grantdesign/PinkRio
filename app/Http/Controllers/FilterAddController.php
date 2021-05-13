<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Filter;

use Validator;

class FilterAddController extends Controller
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
				'alias' => 'required|max:255|unique:filters',
			], $messages);

			if ($validator->fails()) return redirect()->route('filter_add')->withErrors($validator)->withInput();

			$filter = new Filter;

			$filter->fill($input);

			if ($filter->save()) return redirect()->route('filters')->with('status', 'Фильтр добавлен');

		}

		return view('admin.filter_add', [
			'title' => 'Добавление фильтра',
		]);
	}
}
