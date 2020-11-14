<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PostIndex extends Component
{
    public $posts;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->posts = DB::table('posts')->get('post');
    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
