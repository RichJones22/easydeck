<?php


namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::take(5)->get();


        return view('post.index', compact('posts'));
    }

    public function index1()
    {
 echo 'bruce was here....';
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
        ]);

        if ($validator->fails()) {

            return redirect('post')
                ->withErrors($validator)
                ->withInput();
        }

        Post::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title)
        ]);

        return redirect()->back();

    }

    public function show(Post $post) {

        return view('post.single',compact('post'));

    }
}

