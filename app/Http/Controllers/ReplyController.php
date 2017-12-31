<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Thread;

class ReplyController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store($channel, Thread $thread, Request $request)
    {
    	$this->validate($request, [
    		'body' => 'required'
    	]);

    	$thread->addReply([
    		'user_id' => Auth::id(),
    		'body' => request('body')
    	]);

    	return back();
    }
}
