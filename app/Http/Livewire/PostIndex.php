<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PostIndex extends Component
{
    public $posts = ['post 1','post 2','post 3','post 4'];

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->posts = DB::table('posts')->get('post');

//        dd($this->posts);
    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
