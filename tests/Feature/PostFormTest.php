<?php

namespace Tests\Feature;

use App\Http\Livewire\PostIndex;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;

class PostFormTest extends TestCase
{

    /**
     *  does the livewire component exist on the page...
     */
    public function test_post_index_page_contains_livewire_component()
    {
        $this->get("/PostIndex")->assertSeeLivewire("post-index");
    }

    /** @test */
    public function test_PostIndex_contains_heading()
    {
        $this->get("/PostIndex")
            ->assertSeeText('What Posts...');
    }

    /** @test */
    public function test_post_fails_if_not_entered()
    {
        $postIs = null;

        Livewire::test(PostIndex::class)
            ->set('post', $postIs)
            ->call('submitForm')
            ->assertHasErrors([
                'post' => 'required',
            ]);
    }

    /** @test */
    public function test_post_does_not_have_errors_when_entered()
    {
        $postIs = 'bob was here...';

        Livewire::test(PostIndex::class)
            ->set('post', $postIs)
            ->call('submitForm')
            ->assertHasNoErrors([
                'post' => 'required',
            ]);
    }
//    }
}
