<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;

use Validator;

class MenuEditController extends Controller
{
    public function execute(Menu $menu, Request $request)
    {
    	if ($request->isMethod('delete')) {
    		
    		$menu->delete();

    		return redirect()->route('menu')->with('status', 'Меню удалено');

    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'name' => 'required|max:255',
    			'path' => 'required|max:255',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('menu_edit', $menu->id)->withErrors($validator);

    		$menu->fill($input);

    		if ($menu->save()) return redirect()->route('menu')->with('status', 'Меню обновлено');

    	}

    	return view('admin.menu_edit', [
    		'title' => 'Редактирование меню',
    		'menu' => $menu,
    	]);
    }
}
