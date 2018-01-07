<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;
use App\User;

class Thread extends Model
{
	public function path()
	{
		return '/threads/' . $this->channel->slug . '/' . $this->id;
	}

    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function channel()
    {
    	return $this->belongsTo(Channel::class);
    }

    public function addReply($reply)
    {
    	$newReply = new Reply;

    	$newReply->thread_id = $this->id;
    	$newReply->user_id = $reply['user_id'];
    	$newReply->body = $reply['body'];

    	$newReply->save();
    } 

    public function scopeCreatedBy($query, $userName){
    	$user = User::where('name', $userName)->firstOrFail();
    	return $query->where('user_id', $user->id);
    }

    public function scopePopular($query){
        $query->withCount('replies')->orderBy('replies_count', 'des');
    }
}
