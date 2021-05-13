<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;

use Validator;

class PortfolioEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request)
    {
    	if ($request->isMethod('delete')) {

    		$images = $portfolio->img;

    		$images = json_decode($images);
    		
    		foreach ($images as $key => $image) {
    			unlink(public_path('storage/'.$image));
    		}

    		$portfolio->delete();

    		return redirect()->route('admin_portfolios')->with('status', 'Портфолио удалено');

    	}

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
    		], $messages);

    		if ($validator->fails()) return redirect()->route('portfolio_edit')->withErrors($validator);

    		$portfolio->fill($input);

    		if ($portfolio->save()) return redirect()->route('admin_portfolios')->with('status', 'Портфолио обновлено');

    	}

    	return view('admin.portfolio_edit', [
    		'title' => 'Редактирование портфолио',
    		'portfolio' => $portfolio,
    		'filters' => $this->filterAll(),
    		'skills' => $this->skillAll(),
    	]);
    }
}
