<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

use Validator;

class SliderEditController extends Controller
{
    public function execute(Slider $slider, Request $request)
    {
    	if ($request->isMethod('delete')) {

    		$slider->delete();

    		unlink(public_path('storage/'.$slider->img));

    		return redirect()->route('slider')->with('status', 'Слайдер удален');

    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'title' => 'required|max:255',
    			'text' => 'required',
    			'img' => 'image',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('slider_edit', $slider->id)->withErrors($validator);

    		if ($request->hasFile('img')) { // если файл существует

    			unlink(public_path('storage/'.$slider->img)); // удаление старого изображения
    			
    			$path = $request->file('img')->store('slider', 'public');

    			$input['img'] = $path;

    		} else {
    			$input['img'] = $slider->img;
    		}

    		$slider->fill($input);

    		if ($slider->save()) return redirect()->route('slider')->with('status', 'Слайдер обновлен');

    	}

    	return view('admin.slider_edit', [
    		'title' => 'Редактирование слайдера',
    		'slider' => $slider,
    	]);
    }
}
