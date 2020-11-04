<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostIndex extends Component
{
    public $posts = ['post 1','post 2','post 3','post 4'];

    public function render()
    {
        return view('livewire.post-index');
    }
}
