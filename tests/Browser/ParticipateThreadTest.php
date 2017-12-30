<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateThreadTest extends DuskTestCase
{
    use DatabaseMigrations;

   public function testAAuthenticatedUserMayParticipateInThread()
    {
        $user = factory('App\User')->create();
        $thread = factory('App\Thread')->create();

        $this->browse(function (Browser $browser) use($user, $thread){
            $browser->loginAs($user)
                    ->visit('/threads/'.$thread->id)
                    ->type('body','testing reply')
                    ->click('@reply-store')
                    ->assertSee('testing reply');
        });
    }
}
