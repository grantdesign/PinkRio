<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Skill;

use Validator;

class SkillAddController extends Controller
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
    			'alias' => 'required|max:255|unique:skills',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('skill_add')->withErrors($validator)->withInput();

    		$skill = new Skill;

    		$skill->fill($input);

    		if ($skill->save()) return redirect()->route('skills')->with('status', 'Умение добавлено');

    	}

    	return view('admin.skill_add', [
    		'title' => 'Добавление умения',
    	]);
    }
}
