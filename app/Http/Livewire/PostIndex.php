<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PostIndex extends Component
{
    public $posts;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->getAllPosts();
    }

    public function add($post)
    {
        $this->getNewPost()
            ->setAttribute('post', $post)
            ->save();
    }

    public function delete($id = null)
    {
        DB::table('posts')->delete($id);

        // Since we just deleted the post, we need to repopulate the $posts var;
        // so, go get all posts...
        $this->getAllPosts();
    }

    public function render()
    {
        return view('livewire.post-index');
    }

    /**
     * get all posts.
     */
    protected function getAllPosts(): void
    {
        $this->posts = DB::table('posts')->get(['id', 'post']);
    }

    /**
     * @return Post
     */
    protected function getNewPost(): Post
    {
        return (new Post);
    }
}
