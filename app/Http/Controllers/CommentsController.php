<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentsController extends Controller
{
    public function show()
    {
    	$comments = Comment::paginate(5);

    	return view('admin.comments', [
    		'title' => 'Комментарии',
    		'comments' => $comments,
    	]);
    }
}
