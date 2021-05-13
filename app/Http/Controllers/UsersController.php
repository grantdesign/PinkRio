<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function show()
    {
    	$users = User::orderBy('id', 'desc')->paginate(5);

    	return view('admin.users', [
    		'title' => 'Пользователи',
    		'users' => $users,
    	]);
    }
}
