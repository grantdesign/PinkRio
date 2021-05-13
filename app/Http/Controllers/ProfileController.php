<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
    	return view('pink.profile', [
    		'title' => 'Профиль пользователя',
    		'menus' => $this->headerMenu(),
    		'categories' => $this->categoriesAll(),
    		'user' => $user,
    	]);
    }
}
