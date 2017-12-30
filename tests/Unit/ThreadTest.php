<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
	use DatabaseMigrations;

    public function testAThreadHasCreator()
    {
        $thread = factory('App\Thread')->create();

        $this->assertInstanceOf('App\User', $thread->user);
    }

    public function testAThreadCanAddReply()
    {
    	$thread = factory('App\Thread')->create();

    	$thread->addReply([
    		'user_id' => 1,
    		'body' => 'foo'
    	]);

    	$this->assertCount(1, $thread->replies);
    }
}
