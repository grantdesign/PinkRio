<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;

use Validator;
use Arr;

class PortfolioAdd extends Controller
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
    			'desc' => 'required',
    			'text' => 'required',
    			'customer' => 'required|max:255',
    			'min_img' => 'required|image',
    			'max_img' => 'required|image',
    			'path_img' => 'required|image',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('portfolio_add')->withErrors($validator)->withInput();

    		if ($request->hasFile('min_img') && $request->hasFile('max_img') && $request->hasFile('path_img')  ) {
    			
    			$min_dir = $request->file('min_img')->store('portfolios', 'public');
    			$max_dir = $request->file('max_img')->store('portfolios', 'public');
    			$path_dir = $request->file('path_img')->store('portfolios', 'public');

    			$img = ['mini' => $min_dir, 'max' => $max_dir, 'path' => $path_dir];
    			$img = json_encode($img);

    			$input = Arr::except($input, ['min_img', 'max_img', 'path_img']);
    			$input = Arr::add($input, 'img', $img);

    		}

    		$portfolio = new Portfolio;

    		$portfolio->fill($input);

    		if ($portfolio->save()) return redirect()->route('admin_portfolios')->with('status', 'Портфолио добавлено');

    	}

    	return view('admin.portfolio_add', [
    		'title' => 'Добавление портфолио',
    		'filters' => $this->filterAll(),
    		'skills' => $this->skillAll(),
    	]);
    }
}
