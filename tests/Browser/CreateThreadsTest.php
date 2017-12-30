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

        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/threads/create')
                    ->type('title', 'example title')
                    ->type('body', 'example body')
                    ->click('@thread-create')
                    ->assertSee('example body');         
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
