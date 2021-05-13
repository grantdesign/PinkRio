<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Validator;
use Arr;
use Hash;

class UserEditController extends Controller
{
    public function execute(User $user, Request $request)
    {
    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно для заполнения',
    		];

    		$validator = Validator::make($input, [
    			'name' => 'required|max:255',
    			'email' => 'required|email|unique:users',
    		], $messages);

    		if ($validator->fails()) return redirect()->route('user_edit', $user->id)->withErrors($validator);

    		if (!empty($input['new_password'])) {

    			$input['password'] = Hash::make($input['new_password']);
    			$input = Arr::except($input, ['new_password']);

    		} else $input = Arr::except($input, ['new_password']);

    		$user->fill($input);

    		if ($user->save()) return redirect()->route('users')->with('status', 'Пользователь обновлен');

    	}

        $roles = ['Пользователь', 'Администратор'];

    	return view('admin.user_edit', [
    		'title' => 'Редактирование пользователя',
    		'user' => $user,
            'roles' => $roles,
    	]);
    }
}
