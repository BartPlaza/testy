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

            $browser->visit('/threads/'.$thread->id)
                    ->assertSee($thread->title);
        });
    }

     public function testAUserCanReadRepliesOnThread()
    {
    	$thread = factory('App\Thread')->create();
    	$reply = factory('App\Reply')->create(['thread_id'=>$thread->id]);
    	
        $this->browse(function (Browser $browser) use($thread, $reply){

            $browser->visit('/threads/'.$thread->id)
                    ->assertSee($reply->body);
        });
    }
}
				