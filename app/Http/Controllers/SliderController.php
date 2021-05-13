<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

class SliderController extends Controller
{
    public function show()
    {
    	$sliders = Slider::orderBy('id', 'desc')->paginate(4);

    	return view('admin.slider', [
    		'title' => 'Слайдер',
    		'sliders' => $sliders,
    	]);
    }
}
