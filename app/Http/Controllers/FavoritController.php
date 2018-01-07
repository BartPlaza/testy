<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;

class FavoritController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function store(Reply $reply)
    {
    	$reply->favorite();
    }
}
