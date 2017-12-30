<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreatsTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testAUserCanBrowseAllThreads()
    {
    	$thread = factory('App\Thread')->create();

        $this->browse(function (Browser $browser) use($thread){
 
            $browser->visit('/threads')
                    ->assertSee($thread->title);

        });
    }

    public function testAUserCanBrowseThread()
    {
    	$thread = factory('App\Thread')->create();

        $this->browse(function (Browser $browser) use($thread){

            $browser->visit($thread->path())
                    ->assertSee($thread->title);
        });
    }

     public function testAUserCanReadRepliesOnThread()
    {
    	$thread = factory('App\Thread')->create();
    	$reply = factory('App\Reply')->create(['thread_id'=>$thread->id]);
    	
        $this->browse(function (Browser $browser) use($thread, $reply){

            $browser->visit($thread->path())
                    ->assertSee($reply->body);
        });
    }

    public function testAUserCanFilterThreadsBySlug()
    {
    	$channel = factory('App\Channel')->create();
    	$threadInChannel = factory('App\Thread')->create(['channel_id' => $channel->id]);
    	$threadNotInChannel = factory('App\Thread')->create();

    	$this->browse(function (Browser $browser) use($channel, $threadInChannel, $threadNotInChannel){

            $browser->visit($channel->path())
                    ->assertSee($threadInChannel->title)
                    ->assertDontSee($threadNotInChannel->title);
        });
    }
}
				