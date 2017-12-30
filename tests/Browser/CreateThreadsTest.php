<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testAAuthenticatedUserMayPublishAThread()
    {

        $user = factory('App\User')->create();
        $channel = factory('App\Channel')->create();

        $this->browse(function (Browser $browser) use($user, $channel) {
            $browser->loginAs($user)
                    ->visit('/threads/create')
                    ->type('title', 'example title')
                    ->type('body', 'example body')
                    ->select('channel', $channel->id)
                    ->click('@thread-create')
                    ->assertSee('posted: example title');         
        });
    }

    public function testANotAuthenticatedUserCantVisitThreadCreatePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/threads/create')
                    ->assertPathIs('/login');         
        });
    }

    
}
