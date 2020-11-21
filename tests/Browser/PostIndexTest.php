<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostIndexTest extends DuskTestCase
{
    /**
     * test to see that our PostIndex1 view does not have any posts
     *
     * @return void
     */
    public function test_post_index_has_no_posts()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/PostIndex')
                ->assertSee('What Posts...')
                ->assertSee('be the first to enter a post...');
        });
    }

    /**
     * add new post
     *
     * @return void
     */
    public function test_add_post()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/PostIndex')
                ->assertSee('be the first to enter a post...') // start with nothing displayed
                ->type('post' , 'my first post')         // enter your post
                ->pause(1000)
                ->press('Press Me')                          // press the Press Me button
                ->pause(500)
                ->assertsee('dude you rock!!!') // this is a flash message
                ->assertSee('post is:')         // this is the result of the render() by the component
                ->assertSee('my first post');
        });
    }

    /**
     * add new post
     *
     * @return void
     */
    public function test_delete_post()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/PostIndex')
                ->assertSee('be the first to enter a post...') // start with nothing displayed
                ->type('post' , 'my first post')         // enter your post
                ->pause(1000)
                ->press('Press Me')                          // press the Press Me button
                ->pause(1000)
                ->assertSee('post is:')         // this is the result of the render() by the component
                ->assertSee('my first post')
                ->click('#delete')           // delete to post you just added
                ->pause(1000)
                ->assertSee('be the first to enter a post...'); // make sure it is gone
        });
    }
}
