<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
    	return view('admin.user', [
    		'title' => $user->name,
    		'user' => $user,
    	]);
    }
}
