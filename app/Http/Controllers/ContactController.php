<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class ContactController extends Controller
{
    public function show(Request $request)
    {
    	if ($request->isMethod('post')) {

    		$input = $request->except('_token'); // исключаем поле токен

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];
    		
    		$validator = Validator::make($input, [
    			'name' => 'required|max:255',
    			'email' => 'required|email',
    			'message' => 'required|max:255',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('contacts')->withErrors($validator)->withInput();

    		mail(env('MAIL_FROM_ADDRESS'), 'Question', $input['message']);

    		return redirect()->route('contacts')->with('status', 'Сообщение успешно отправлено и скоро вы получите ответ');

    	}

    	return view('pink.contacts', [
    		'title' => 'Контакты',
    		'menus' => $this->headerMenu(),
            'categories' => $this->categoriesAll(),
    	]);
    }
}
