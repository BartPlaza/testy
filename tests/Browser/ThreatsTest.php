<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreatsTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testAUserCanBrowseThreads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/threads')
                    ->assertStatus(200);
        });
    }
}
