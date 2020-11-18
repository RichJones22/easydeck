<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PostIndex extends Component
{
    /**
     * contains all posts.
     *
     * @var array
     */
    public $posts = [];

    /**
     * contains the single post that we are adding.
     *
     * @var
     */
    public $post;

    /**
     * PostIndex constructor; Call this guy on instantiation.
     *
     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->getAllPosts();
    }

    /**
     * display the post view
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('post-view');
    }

    /**
     * using LiveWire form submission
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitForm()
    {
        // validate use input
        $this->validateInput();

        // perform the sql save.
        $this->add($this->post);

        // send a flash message to user acknowledging record was added.
        flash('dude you rock!!!', "success");

        // redirect user back to the post.index route...
        return redirect()->route('post.index');
    }

    /**
     * add a new post.
     *
     * @param $post
     */
    public function add($post)
    {
        $this->getNewPost()
            ->setAttribute('post', $post)
            ->save();

        // Since we just added the post, we need to repopulate the $posts var;
        // so, go get all posts...
        $this->getAllPosts();
    }

    /**
     * delete a specific post
     *
     * @param null $id
     */
    public function delete($id = null)
    {
        DB::table('posts')->delete($id);

        // Since we just deleted the post, we need to repopulate the $posts var;
        // so, go get all posts...
        $this->getAllPosts();
    }

    /**
     * facilitates communication with the post-index.blade.php view...
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
     * create a new instance of the Post model and return it.
     *
     * @return Post
     */
    protected function getNewPost(): Post
    {
        return (new Post);
    }

    /**
     *  validate the input
     */
    protected function validateInput(): void
    {
        // first repopulate the $posts var in case of validation error.
        $this->getAllPosts();

        // perform validation
        $this->validate([
            'post' => 'required'
        ], [
            'post.required' => 'Post missing; Please enter a post...'
        ]);
    }
}
