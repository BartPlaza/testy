<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreatsTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testAUserCanBrowseAllThreads()
    {
        $this->browse(function (Browser $browser) {
        	$thread = factory('App\Thread')->create();

            $browser->visit('/threads')
                    ->assertSee($thread->title);

        });
    }

    public function testAUserCanBrowseThread()
    {
        $this->browse(function (Browser $browser) {
        	$thread = factory('App\Thread')->create();

            $browser->visit('/threads/'.$thread->id)
                    ->assertSee($thread->title);
        });
    }
}
				