<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;

use Validator;

class MenuAddController extends Controller
{
    public function execute(Request $request)
    {
    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'name' => 'required|max:255',
    			'path' => 'required|max:255',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('menu_add')->withErrors($validator)->withInput();

    		$menu = new Menu;

    		$menu->fill($input);

    		if ($menu->save()) return redirect()->route('menu')->with('status', 'Меню добавлено');

    	}

    	return view('admin.menu_add', [
    		'title' => 'Добавление меню',
    	]);
    }
}
