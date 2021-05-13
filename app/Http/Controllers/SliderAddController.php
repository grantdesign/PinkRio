<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

use Validator;

use Arr;

class SliderAddController extends Controller
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
    			'text' => 'required',
    			'img' => 'required|image',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('slider_add')->withErrors($validator)->withInput();

    		if ($request->hasFile('img')) { // если файл существует

    			$path = $request->file('img')->store('slider', 'public');
                
                $input['img'] = $path;

                /*$input = Arr::except($input, 'img'); // удаление поля img из массива
                $input = Arr::add($input, 'img', $path); // добавление новой ячейки в массив $input*/

    		}

    		$slider = new Slider;

    		$slider->fill($input);

    		if ($slider->save()) return redirect()->route('slider')->with('status', 'Слайдер добавлен');

    	}

    	return view('admin.slider_add', [
    		'title' => 'Добавление слайдера',
    	]);
    }
}