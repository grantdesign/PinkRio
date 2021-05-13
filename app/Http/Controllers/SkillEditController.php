<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Skill;

use Validator;

class SkillEditController extends Controller
{
    public function execute(Skill $skill, Request $request)
    {
    	if ($request->isMethod('delete')) {
    		
    		$skill->delete();

    		return redirect()->route('skills')->with('status', 'Умение удалено');

    	}
    	
    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'title' => 'required|max:255',
    			'alias' => 'required|max:255|unique:skills',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('skill_edit', $skill->id)->withErrors($validator);

    		$skill->fill($input);

    		if ($skill->save()) return redirect()->route('skills')->with('status', 'Умение обновлено');

    	}

    	return view('admin.skill_edit', [
    		'title' => 'Редактирование портфолио',
    		'skill' => $skill,
    	]);
    }
}
