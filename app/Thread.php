<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;

class Thread extends Model
{
    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function addReply($reply)
    {
    	$newReply = new Reply;

    	$newReply->thread_id = $this->id;
    	$newReply->user_id = $reply['user_id'];
    	$newReply->body = $reply['body'];

    	$newReply->save();
    } 
}
