<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reply extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function favorites()
    {
    	return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite()
    {
    	if(! $this->favorites()->where(['user_id'=>Auth::id()])->exists())
    	$this->favorites()->create(['user_id'=>Auth::id()]);
    }

    public function isFavorited()
    {
    	return $this->favorites()->where('user_id', Auth::id())->exists();
    }
}
