<?php

namespace App\Http\Controllers;

use App\Http\Livewire\PostIndex;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('post-view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param PostIndex $postIndex
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, PostIndex $postIndex)
    {
        // validate use input
        $this->validateInput($request);

        // call PostIndex LiveWire component to perform the sql save.
        $postIndex->add($request->input(['post']));

        // send a flash message to user acknowledging record was added.
        flash('dude you rock!!!', "success");

        // redirect user back to the post.index route...
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     */
    protected function validateInput(Request $request): void
    {
        $request->validate([
            'post' => 'required'
        ], [
            'post.required' => 'Post missing; Please enter a post...'
        ]);
    }
}
