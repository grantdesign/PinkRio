<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentEditController extends Controller
{
    public function execute(Comment $comment, Request $request)
    {
    	if ($request->isMethod('delete')) {
    		
    		$comment->delete();
    		
    		return redirect()->route('comments')->with('status', 'Комментарий удален');

    	}
    }
}
